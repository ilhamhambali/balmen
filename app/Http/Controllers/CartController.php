<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart; // PERUBAHAN: Gunakan fasad yang benar

class CartController extends Controller
{
    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function store(Request $request, Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->input('quantity', 1),
            'attributes' => [
                'image' => $product->image,
            ],
            'associatedModel' => $product
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Memperbarui kuantitas item di keranjang.
     */
    public function update(Request $request, $id) // ID item, bukan rowId
    {
        $request->validate(['quantity' => 'required|numeric|min:1']);

        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function destroy($id) // ID item, bukan rowId
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
    }
}
