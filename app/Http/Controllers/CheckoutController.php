<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function index()
    {
        $cartItems = Cart::getContent();
        if ($cartItems->isEmpty()) {
            return redirect()->route('shop.index')->with('info', 'Your cart is empty.');
        }
        return view('checkout', compact('cartItems'));
    }

    /**
     * Memproses dan menyimpan pesanan.
     */
    public function placeOrder(Request $request)
    {
        // Validasi input dari form checkout
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Buat pesanan baru di tabel 'orders'
        $order = Order::create([
            'user_id' => Auth::id(), // Akan menjadi null jika pengguna adalah tamu
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => Cart::getTotal(),
            'status' => 'pending',
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'shipping_address' => $request->shipping_address,
            'phone_number' => $request->phone_number,
            'payment_method' => $request->payment_method,
        ]);

        // Simpan setiap item di keranjang ke tabel 'order_items'
        foreach (Cart::getContent() as $item) {
            $order->items()->create([
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Kosongkan keranjang belanja
        Cart::clear();

        // Arahkan ke halaman konfirmasi pesanan
        return redirect()->route('checkout.confirmation', $order);
    }

    /**
     * Menampilkan halaman konfirmasi pesanan.
     */
    public function confirmation(Order $order)
    {
        return view('order-confirmation', compact('order'));
    }
}
