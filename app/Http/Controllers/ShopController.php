<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Menampilkan halaman toko dengan semua produk, kategori, dan brand,
     * serta menangani logika filter.
     */
    public function index(Request $request)
    {
        // Memulai query untuk produk
        $productsQuery = Product::query();

        // Filter berdasarkan kategori jika ada di URL
        if ($request->has('category')) {
            $categorySlug = $request->input('category');
            $productsQuery->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Filter berdasarkan brand jika ada di URL
        if ($request->has('brand')) {
            $brandSlug = $request->input('brand');
            $productsQuery->whereHas('brand', function ($query) use ($brandSlug) {
                $query->where('slug', $brandSlug);
            });
        }

        // Mengambil produk yang sudah difilter dengan paginasi
        $products = $productsQuery->latest()->paginate(12);

        // Mengambil semua kategori dan brand untuk filter sidebar
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();

        return view('shop', compact('products', 'categories', 'brands'));
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
