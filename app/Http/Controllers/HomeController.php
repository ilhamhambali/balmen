<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar produk.
     */
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        return view('home', compact('products'));
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
     * PERUBAHAN: Metode baru untuk menampilkan halaman detail produk.
     */
    public function productDetails(Product $product)
    {
        // Anda bisa menambahkan logika lain di sini, seperti mengambil produk terkait
        return view('details', compact('product'));
    }
}
