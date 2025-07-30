<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data untuk berbagai section.
     */
    public function index()
    {
        // Mengambil 8 kategori untuk ditampilkan di carousel
        $categories = Category::take(8)->get();

        // Mengambil 8 produk terbaru sebagai "Featured Products"
        $featuredProducts = Product::latest()->take(8)->get();

        // Mengambil 8 produk lain (misalnya, secara acak) sebagai "Hot Deals"
        $hotDealProducts = Product::inRandomOrder()->take(8)->get();

        // Mengirim semua data ke view 'home'
        return view('home', compact('categories', 'featuredProducts', 'hotDealProducts'));
    }

    /**
     * Menangani pencarian produk dan mengembalikan hasil dalam format JSON.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('sku', 'LIKE', "%{$query}%")
            ->take(5)
            ->get();
        return response()->json($products);
    }

    /**
     * Menampilkan halaman detail produk.
     */
    public function productDetails(Product $product)
    {
        $product->load('images', 'brand', 'categories');
        return view('details', compact('product'));
    }
}
