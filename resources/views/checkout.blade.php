<x-frontend-layout>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <form name="checkout-form" method="POST" action="{{ route('checkout.placeOrder') }}">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <h4>SHIPPING DETAILS</h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="customer_name" name="customer_name"
                                        value="{{ auth()->user()->name ?? old('customer_name') }}" required>
                                    <label for="customer_name">Full Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    {{-- Email akan terisi otomatis & read-only jika login --}}
                                    <input type="email" class="form-control" id="customer_email" name="customer_email"
                                        value="{{ auth()->user()->email ?? old('customer_email') }}" required
                                        @auth readonly @endauth>
                                    <label for="customer_email">Email Address *</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        required>
                                    <label for="phone_number">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                                    <label for="shipping_address">Shipping Address *</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th align="right">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->name }} x {{ $item->quantity }}</td>
                                                <td align="right">${{ number_format($item->getPriceSum(), 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td align="right">${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td align="right">${{ number_format(Cart::getTotal(), 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="payment_method" id="payment_method_1" value="Direct bank transfer"
                                        checked>
                                    <label class="form-check-label" for="payment_method_1">Direct bank transfer</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="payment_method" id="payment_method_2" value="Cash on delivery">
                                    <label class="form-check-label" for="payment_method_2">Cash on delivery</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-checkout w-100">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
</x-frontend-layout>
