<x-frontend-layout>
    <main class="pt-90">
        <div class="mb-md-1 pb-md-3"></div>
        <section class="product-single container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-single__media" data-media-type="vertical-thumbnail">
                        <div class="product-single__image">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    {{-- Gambar Utama --}}
                                    <div class="swiper-slide product-single__image-item">
                                        <img loading="lazy" class="h-auto"
                                            src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/674x674' }}"
                                            width="674" height="674" alt="{{ $product->name }}" />
                                    </div>
                                    {{-- Gambar Galeri --}}
                                    @foreach ($product->images as $image)
                                        <div class="swiper-slide product-single__image-item">
                                            <img loading="lazy" class="h-auto" src="{{ Storage::url($image->image) }}"
                                                width="674" height="674" alt="{{ $product->name }}" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_prev_sm" />
                                    </svg></div>
                                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_next_sm" />
                                    </svg></div>
                            </div>
                        </div>
                        <div class="product-single__thumbnail">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    {{-- Thumbnail Gambar Utama --}}
                                    <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                            class="h-auto"
                                            src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/104x104' }}"
                                            width="104" height="104" alt="" /></div>
                                    {{-- Thumbnail Gambar Galeri --}}
                                    @foreach ($product->images as $image)
                                        <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                                class="h-auto" src="{{ Storage::url($image->image) }}" width="104"
                                                height="104" alt="" /></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between mb-4 pb-md-2">
                        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                            <a href="{{ url('/') }}"
                                class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="{{ route('shop.index') }}"
                                class="menu-link menu-link_us-s text-uppercase fw-medium">Shop</a>
                        </div>
                    </div>
                    <h1 class="product-single__name">{{ $product->name }}</h1>
                    <div class="product-single__price">
                        <span class="current-price">${{ number_format($product->price, 2) }}</span>
                    </div>
                    <div class="product-single__short-desc">
                        <p>{{ $product->description }}</p>
                    </div>
                    {{-- Ganti form lama dengan ini --}}
                    <form action="{{ route('cart.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="product-single__addtocart">
                            <div class="qty-control position-relative">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="qty-control__number text-center">
                                <div class="qty-control__reduce">-</div>
                                <div class="qty-control__increase">+</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-addtocart">Add to Cart</button>
                        </div>
                    </form>
                    <div class="product-single__meta-info mt-4">
                        <div class="meta-item">
                            <label>SKU:</label>
                            <span>{{ $product->sku ?? 'N/A' }}</span>
                        </div>
                        <div class="meta-item">
                            <label>Categories:</label>
                            <span>{{ $product->categories->pluck('name')->join(', ') }}</span>
                        </div>
                        <div class="meta-item">
                            <label>Brand:</label>
                            <span>{{ $product->brand->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-single__details-tab mt-5">
                {{-- Bagian tab deskripsi, info tambahan, dan review bisa ditambahkan di sini nanti --}}
            </div>
        </section>
        <section class="products-carousel container mt-5">
            {{-- Bagian produk terkait bisa ditambahkan di sini nanti --}}
        </section>
    </main>
</x-frontend-layout>
