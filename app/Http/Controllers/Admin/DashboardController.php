<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data statistik
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        // Mengambil 5 produk dengan stok paling sedikit (yang stoknya lebih dari 0)
        $lowStockProducts = Product::where('stock', '>', 0)->orderBy('stock', 'asc')->take(5)->get();

        // Mengirim semua data ke view
        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'lowStockProducts'
        ));
    }
}
