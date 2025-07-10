<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua produk dari yang terbaru dengan paginasi
        $products = Product::latest()->paginate(10);
        // Mengembalikan view 'index' dengan data produk
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil semua kategori untuk ditampilkan di form
        $categories = Category::all();
        // Mengembalikan view 'create' dengan data kategori
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Menyimpan produk yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fit_type' => 'nullable|in:regular,slim_fit,oversize',
            'categories' => 'required|array',
        ]);

        $imagePath = null;
        // Cek jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage dan dapatkan path-nya
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Buat produk baru di database
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'image' => $imagePath,
            'fit_type' => $request->fit_type,
        ]);

        // Lampirkan kategori yang dipilih ke produk
        $product->categories()->attach($request->categories);

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu produk.
     * (Metode ini opsional untuk panel admin, lebih sering untuk sisi publik)
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Mengembalikan view 'show' dengan data produk yang dipilih
        return view('admin.products.show', compact('product'));
    }

    /**
     * Menampilkan form untuk mengedit produk.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Mengambil semua kategori untuk ditampilkan di form
        $categories = Category::all();
        // Mengembalikan view 'edit' dengan data produk dan kategori
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Memperbarui produk yang ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fit_type' => 'nullable|in:regular,slim_fit,oversize',
            'categories' => 'required|array',
        ]);

        $imagePath = $product->image;
        // Cek jika ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru dan perbarui path
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Perbarui data produk di database
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'image' => $imagePath,
            'fit_type' => $request->fit_type,
        ]);

        // Sinkronkan kategori (hapus yang lama, lampirkan yang baru)
        $product->categories()->sync($request->categories);

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
