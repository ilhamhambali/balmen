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
                                    @if ($product->image)
                                        <div class="swiper-slide product-single__image-item">
                                            <img loading="lazy" class="h-auto" src="{{ Storage::url($product->image) }}"
                                                width="674" height="674" alt="{{ $product->name }}" />
                                        </div>
                                    @endif
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
                                    @if ($product->image)
                                        <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                                class="h-auto" src="{{ Storage::url($product->image) }}" width="104"
                                                height="104" alt="" /></div>
                                    @endif
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

                    {{-- PERUBAHAN: Tombol ini sekarang memicu modal Bootstrap --}}
                    <div class="my-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#aiStylistModal"
                            class="btn-link btn-link_us-s text-uppercase fw-medium">AI Stylist & Size Finder</a>
                    </div>

                    <div class="product-single__short-desc">
                        <p>{{ $product->description }}</p>
                    </div>
                    <form name="addtocart-form" method="post" action="{{ route('cart.store', $product->id) }}">
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
        </section>

        <!-- PERUBAHAN: Menggunakan struktur modal Bootstrap dengan Alpine.js di dalamnya -->
        <div class="modal fade" id="aiStylistModal" tabindex="-1" aria-labelledby="aiStylistModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" x-data="{ height: 170, weight: 65, sizeRecommendation: null, outfitRecommendations: [], loading: false }">
                    <div class="modal-header">
                        <h5 class="modal-title" id="aiStylistModalLabel">AI Stylist & Size Finder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form
                            @submit.prevent="
                            loading = true;
                            sizeRecommendation = null;
                            outfitRecommendations = [];
                            Promise.all([
                                fetch('{{ route('shop.products.getSizeRecommendation') }}', {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    body: JSON.stringify({ height: height, weight: weight })
                                }).then(res => res.json()),
                                fetch('{{ route('shop.products.recommendations', $product->id) }}', {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    body: JSON.stringify({ height: height, weight: weight })
                                }).then(res => res.json())
                            ]).then(([sizeData, outfitData]) => {
                                sizeRecommendation = sizeData.size;
                                outfitRecommendations = outfitData;
                                loading = false;
                            }).catch(() => { loading = false; alert('An error occurred.'); })
                        ">
                            <div class="form-floating mb-4">
                                <input type="number" x-model="height" id="height" class="form-control" required
                                    placeholder="Height (cm)">
                                <label for="height">Height (cm)</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" x-model="weight" id="weight" class="form-control" required
                                    placeholder="Weight (kg)">
                                <label for="weight">Weight (kg)</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Get Recommendation</button>
                        </form>

                        <div x-show="loading" class="text-center mt-4">Calculating...</div>

                        <div x-show="!loading && (sizeRecommendation || outfitRecommendations.length > 0)"
                            class="mt-4" x-cloak>
                            <div x-show="sizeRecommendation" class="text-center p-3 bg-light rounded">
                                <p class="mb-1">Our recommendation for you:</p>
                                <p class="h3 fw-bold text-primary" x-text="`Size ${sizeRecommendation}`"></p>
                            </div>

                            <div x-show="outfitRecommendations.length > 0" class="mt-4">
                                <h4 class="h6 text-uppercase mb-3 text-center">Styled by <strong>Balmen AI</strong>
                                </h4>
                                <div class="row row-cols-3 g-3">
                                    <template x-for="product in outfitRecommendations" :key="product.id">
                                        <div class="col">
                                            <div class="product-card">
                                                <div class="pc__img-wrapper">
                                                    <a :href="`/products/${product.slug}`">
                                                        <img :src="product.image ? `/storage/${product.image}` :
                                                            'https://placehold.co/150x200'"
                                                            class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="pc__info text-center mt-2">
                                                    <h6 class="pc__title fs-xs"><a :href="`/products/${product.slug}`"
                                                            x-text="product.name"></a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-frontend-layout>
