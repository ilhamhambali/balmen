<x-frontend-layout>

    <!-- Slideshow Utama (dari template) -->
    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow"
        data-settings='{
        "autoplay": { "delay": 5000 },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="overflow-hidden position-relative h-100">
                    <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                        <img loading="lazy" src="{{ asset('assets/images/home/demo3/slideshow-character1.png') }}"
                            width="542" height="733" alt="Fashion Model"
                            class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                    </div>
                    <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                        <h6
                            class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                            New Collection</h6>
                        <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Urban Essentials
                        </h2>
                        <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Redefined</h2>
                        <a href="{{ route('shop.index') }}"
                            class="btn btn-primary mt-3 animate animate_fade animate_btt animate_delay-7">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div
                class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
            </div>
        </div>
    </section>

    <div class="container mw-1620 bg-white border-radius-10">
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <!-- Carousel Kategori (Dinamis) -->
        <section class="category-carousel container">
            <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Shop by Category</h2>
            <div class="position-relative">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{ "slidesPerView": 8, "slidesPerGroup": 1, "loop": true, "navigation": { "nextEl": ".products-carousel__next-1", "prevEl": ".products-carousel__prev-1" }, "breakpoints": { "320": { "slidesPerView": 2, "slidesPerGroup": 2, "spaceBetween": 15 }, "768": { "slidesPerView": 4, "slidesPerGroup": 4, "spaceBetween": 30 }, "992": { "slidesPerView": 6, "slidesPerGroup": 1, "spaceBetween": 45 }, "1200": { "slidesPerView": 8, "slidesPerGroup": 1, "spaceBetween": 60 } } }'>
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide">
                                <img loading="lazy" class="w-100 h-auto mb-3"
                                    src="https://placehold.co/124x124/f0f0f0/333?text={{ $category->name }}"
                                    width="124" height="124" alt="{{ $category->name }}" />
                                <div class="text-center">
                                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                        class="menu-link fw-medium">{{ $category->name }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                    class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25">
                        <use href="#icon_prev_md" />
                    </svg></div>
                <div
                    class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25">
                        <use href="#icon_next_md" />
                    </svg></div>
            </div>
        </section>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <!-- Hot Deals (Dinamis) -->
        <section class="hot-deals container">
            <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
            <div class="row">
                <div
                    class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
                    <h2>Summer Sale</h2>
                    <h2 class="fw-bold">Up to 60% Off</h2>
                    <a href="{{ route('shop.index') }}"
                        class="btn-link default-underline text-uppercase fw-medium mt-3">View All</a>
                </div>
                <div class="col-md-6 col-lg-8 col-xl-80per">
                    <div class="position-relative">
                        <div class="swiper-container js-swiper-slider"
                            data-settings='{ "slidesPerView": 4, "slidesPerGroup": 4, "loop": false, "breakpoints": { "320": { "slidesPerView": 2, "slidesPerGroup": 2, "spaceBetween": 14 }, "768": { "slidesPerView": 3, "slidesPerGroup": 3, "spaceBetween": 24 }, "992": { "slidesPerView": 4, "slidesPerGroup": 1, "spaceBetween": 30 } } }'>
                            <div class="swiper-wrapper">
                                @foreach ($hotDealProducts as $product)
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="{{ route('shop.products.details', $product->slug) }}">
                                                <img loading="lazy"
                                                    src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/258x313' }}"
                                                    width="258" height="313" alt="{{ $product->name }}"
                                                    class="pc__img">
                                            </a>
                                        </div>
                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title"><a
                                                    href="{{ route('shop.products.details', $product->slug) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="product-card__price d-flex">
                                                <span
                                                    class="money price text-secondary">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <!-- Featured Products (Dinamis) -->
        <section class="products-grid container">
            <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Featured Products</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse ($featuredProducts as $product)
                    <div class="col">
                        <div class="product-card product-card_style3 h-100">
                            <div class="pc__img-wrapper">
                                <a href="{{ route('shop.products.details', $product->slug) }}">
                                    <img loading="lazy"
                                        src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/330x400' }}"
                                        width="330" height="400" alt="{{ $product->name }}" class="pc__img">
                                </a>
                            </div>
                            <div class="pc__info position-relative p-3">
                                <h6 class="pc__title"><a
                                        href="{{ route('shop.products.details', $product->slug) }}">{{ $product->name }}</a>
                                </h6>
                                <div class="product-card__price d-flex align-items-center">
                                    <span class="money price">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No products found.</p>
                    </div>
                @endforelse
            </div>
        </section>
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    </div>

</x-frontend-layout>
