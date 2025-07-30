<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    // ... (metode index dan productDetails tetap sama)
    public function index(Request $request)
    {
        $productsQuery = Product::query();
        if ($request->has('category')) {
            $categorySlug = $request->input('category');
            $productsQuery->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }
        if ($request->has('brand')) {
            $brandSlug = $request->input('brand');
            $productsQuery->whereHas('brand', function ($query) use ($brandSlug) {
                $query->where('slug', $brandSlug);
            });
        }
        $products = $productsQuery->latest()->paginate(12);
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();
        return view('shop', compact('products', 'categories', 'brands'));
    }
    public function productDetails(Product $product)
    {
        $product->load('images', 'brand', 'categories');
        return view('details', compact('product'));
    }


    /**
     * PERUBAHAN: Metode ini sekarang menerima data tinggi & berat untuk rekomendasi yang lebih personal.
     */
    public function getAiRecommendations(Request $request, Product $product)
    {
        $request->validate([
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $apiKey = config('gemini.api_key');
        if (!$apiKey) {
            return response()->json(['error' => 'Gemini API key is not configured.'], 500);
        }

        $prompt = "You are a fashion stylist for a brand called Balmen. A customer with a height of {$request->height} cm and weight of {$request->weight} kg is looking at a '{$product->name}'. Suggest three other product categories to complete an outfit. Respond with only a comma-separated list. For example: Chino Pants, Denim Jacket, White Sneakers";

        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}", [
                    'contents' => [['parts' => [['text' => $prompt]]]]
                ]);

            if (!$response->successful()) {
                Log::error('Gemini API Error: ' . $response->body());
                return response()->json([]);
            }

            $recommendationsText = $response->json('candidates.0.content.parts.0.text');

            if (!$recommendationsText) {
                return response()->json([]);
            }

            $suggestedItems = array_map('trim', explode(',', $recommendationsText));

            $recommendedProducts = Product::where(function ($query) use ($suggestedItems) {
                foreach ($suggestedItems as $item) {
                    $query->orWhere('name', 'like', '%' . $item . '%')
                        ->orWhereHas('categories', function ($q) use ($item) {
                            $q->where('name', 'like', '%' . $item . '%');
                        });
                }
            })
                ->where('id', '!=', $product->id)
                ->take(3)
                ->get();

            return response()->json($recommendedProducts);
        } catch (\Exception $e) {
            Log::error('Error fetching Gemini recommendations: ' . $e->getMessage());
            return response()->json([]);
        }
    }

    /**
     * Metode untuk merekomendasikan ukuran.
     */
    public function getSizeRecommendation(Request $request)
    {
        $request->validate([
            'height' => 'required|numeric|min:100|max:250',
            'weight' => 'required|numeric|min:30|max:200',
        ]);

        $height = $request->input('height');
        $weight = $request->input('weight');
        $recommendation = 'M'; // Ukuran default

        if ($height < 165 && $weight < 60) {
            $recommendation = 'S';
        } elseif ($height >= 165 && $height < 175 && $weight >= 60 && $weight < 75) {
            $recommendation = 'M';
        } elseif ($height >= 175 && $height < 185 && $weight >= 75 && $weight < 90) {
            $recommendation = 'L';
        } elseif ($height >= 185 || $weight >= 90) {
            $recommendation = 'XL';
        }

        return response()->json(['size' => $recommendation]);
    }
}
