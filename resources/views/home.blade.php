<x-frontend-layout>

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
                        {{-- PERUBAHAN: Teks Promosi Baru --}}
                        <h6
                            class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                            New Collection</h6>
                        <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Urban Essentials
                        </h2>
                        <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Redefined</h2>
                        <a href="#"
                            class="btn btn-primary mt-3 animate animate_fade animate_btt animate_delay-7">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <h2 class="section-title text-center mb-5">Featured Products</h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="product-card product-card_style3 h-100">
                        <div class="pc__img-wrapper">
                            <a href="#">
                                <img loading="lazy"
                                    src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/330x400' }}"
                                    width="330" height="400" alt="{{ $product->name }}" class="pc__img">
                            </a>
                        </div>
                        <div class="pc__info position-relative p-3">
                            <h6 class="pc__title"><a href="#">{{ $product->name }}</a></h6>
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
        </div><!-- /.row -->
    </div>

</x-frontend-layout>
