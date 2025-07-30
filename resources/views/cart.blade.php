<x-frontend-layout>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Cart</h2>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="shopping-cart">
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <a
                                                href="{{ route('shop.products.details', $item->associatedModel->slug) }}">
                                                <img loading="lazy"
                                                    src="{{ $item->attributes->image ? Storage::url($item->attributes->image) : 'https://placehold.co/120x120' }}"
                                                    width="120" height="120" alt="{{ $item->name }}" />
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="shopping-cart__product-item__detail">
                                            <h4><a
                                                    href="{{ route('shop.products.details', $item->associatedModel->slug) }}">{{ $item->name }}</a>
                                            </h4>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="shopping-cart__product-price">${{ number_format($item->price, 2) }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="qty-control position-relative d-flex align-items-center">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                    min="1" class="qty-control__number text-center">
                                                <button type="submit" class="btn btn-link p-0 ms-2">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <span
                                            class="shopping-cart__subtotal">${{ number_format($item->getPriceSum(), 2) }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove-cart border-0 bg-transparent">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676">
                                                    <path
                                                        d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                    <path
                                                        d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">Your cart is empty.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>${{ number_format(Cart::getTotal(), 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                {{-- PERUBAHAN: Perbarui tautan ini --}}
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-checkout">PROCEED TO
                                    CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-frontend-layout>
