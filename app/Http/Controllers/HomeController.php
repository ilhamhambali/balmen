<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Ganti Post menjadi Product
        $products = \App\Models\Product::latest()->paginate(9);
        return view('home', compact('products'));
    }

    // Ganti nama metode dan tipe parameter
    public function showProduct(\App\Models\Product $product)
    {
        return view('product-detail', compact('product'));
    }
}
