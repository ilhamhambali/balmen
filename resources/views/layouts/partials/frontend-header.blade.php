{{-- Elemen SVG Icons --}}
<svg class="d-none">
    <symbol id="icon_nav" viewBox="0 0 25 18">
        <rect width="25" height="2" />
        <rect y="8" width="20" height="2" />
        <rect y="16" width="25" height="2" />
    </symbol>
    <symbol id="icon_search" viewBox="0 0 20 20">
        <g clip-path="url(#clip0_6_7)">
            <path
                d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.84769 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.84769 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.84769 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z"
                fill="currentColor" />
            <path
                d="M19.7618 18.6122L15.1006 13.9509C14.783 13.6333 14.2686 13.6333 13.951 13.9509C13.6334 14.2683 13.6334 14.7832 13.951 15.1005L18.6122 19.7618C18.771 19.9206 18.9789 20 19.187 20C19.3949 20 19.603 19.9206 19.7618 19.7618C20.0795 19.4444 20.0795 18.9295 19.7618 18.6122Z"
                fill="currentColor" />
        </g>
        <defs>
            <clipPath id="clip0_6_7">
                <rect width="20" height="20" fill="white" />
            </clipPath>
        </defs>
    </symbol>
    <symbol id="icon_user" viewBox="0 0 20 20">
        <g clip-path="url(#clip0_6_29)">
            <path
                d="M10 11.2652C3.99077 11.2652 0.681274 14.108 0.681274 19.2701C0.681274 19.6732 1.00803 20 1.4112 20H18.5888C18.992 20 19.3187 19.6732 19.3187 19.2701C19.3188 14.1083 16.0093 11.2652 10 11.2652ZM2.16768 18.5402C2.45479 14.6805 5.08616 12.7251 10 12.7251C14.9139 12.7251 17.5453 14.6805 17.8326 18.5402H2.16768Z"
                fill="currentColor" />
            <path
                d="M10 0C7.23969 0 5.1582 2.12336 5.1582 4.93895C5.1582 7.83699 7.33023 10.1944 10 10.1944C12.6698 10.1944 14.8419 7.83699 14.8419 4.93918C14.8419 2.12336 12.7604 0 10 0ZM10 8.7348C8.13508 8.7348 6.61805 7.03211 6.61805 4.93918C6.61805 2.92313 8.04043 1.45984 10 1.45984C11.9283 1.45984 13.382 2.95547 13.382 4.93918C13.382 7.03211 11.865 8.7348 10 8.7348Z"
                fill="currentColor" />
        </g>
        <defs>
            <clipPath id="clip0_6_29">
                <rect width="20" height="20" fill="white" />
            </clipPath>
        </defs>
    </symbol>
    <symbol id="icon_cart" viewBox="0 0 20 20">
        <path
            d="M17.6562 4.6875H15.2755C14.9652 2.05164 12.7179 0 10 0C7.28215 0 5.0348 2.05164 4.72445 4.6875H2.34375C1.91227 4.6875 1.5625 5.03727 1.5625 5.46875V19.2188C1.5625 19.6502 1.91227 20 2.34375 20H17.6562C18.0877 20 18.4375 19.6502 18.4375 19.2188V5.46875C18.4375 5.03727 18.0877 4.6875 17.6562 4.6875ZM10 1.5625C11.8548 1.5625 13.3992 2.91621 13.6976 4.6875H6.30238C6.60082 2.91621 8.14516 1.5625 10 1.5625ZM16.875 18.4375H3.125V6.25H4.6875V8.59375C4.6875 9.02523 5.03727 9.375 5.46875 9.375C5.90023 9.375 6.25 9.02523 6.25 8.59375V6.25H13.75V8.59375C13.75 9.02523 14.0998 9.375 14.5312 9.375C14.9627 9.375 15.3125 9.02523 15.3125 8.59375V6.25H16.875V18.4375Z"
            fill="currentColor" />
        <symbol id="icon_logout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
        </symbol>

</svg>
</svg>

<header id="header" class="header header-fullwidth">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/balmen-logo.png') }}" alt="Balmen" class="logo__image d-block"
                        style="max-height: 40px;" />
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item"><a href="{{ route('home') }}" class="navigation__link">Home</a></li>
                    <li class="navigation__item"><a href="{{ route('shop.index') }}" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item"><a href="{{ route('shop.index') }}"
                            class="navigation__link">Categories</a></li>
                    <li class="navigation__item"><a href="{{ route('contact') }}" class="navigation__link">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <!-- PERUBAHAN: Menggunakan struktur asli dari template -->
                <div class="header-tools__item hover-container">
                    <div class="js-hover__open position-relative">
                        <a class="js-search-popup search-field__actor" href="#">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                                <use href="#icon_search" />
                            </svg>
                            <i class="btn-icon btn-close-lg"></i>
                        </a>
                    </div>

                    <div class="search-popup js-hidden-content" x-data="{ query: '', results: [], loading: false }">
                        <form class="search-field container" @submit.prevent>
                            <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                            <div class="position-relative">
                                <input x-ref="searchInput" x-model.debounce.300ms="query"
                                    @input.debounce.300ms="if (query.length > 2) {
                                            loading = true;
                                            results = [];
                                            fetch('{{ route('products.search') }}?query=' + query)
                                                .then(res => res.json())
                                                .then(data => { results = data; loading = false; })
                                                .catch(() => { loading = false; });
                                        } else { results = []; }"
                                    class="search-field__input search-popup__input w-100 fw-medium" type="text"
                                    name="search-keyword" placeholder="Search products">
                                <button class="btn-icon search-popup__submit" type="submit">
                                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                                        <use href="#icon_search" />
                                    </svg>
                                </button>
                            </div>

                            <div class="search-popup__results mt-4">
                                <div x-show="loading" class="text-center text-secondary py-2">Searching...</div>
                                <div x-show="!loading && query.length > 2 && results.length === 0"
                                    class="text-center text-secondary py-2">No results found for "<span
                                        x-text="query"></span>".</div>

                                <div x-show="!loading && results.length > 0" class="search-result row row-cols-5 g-4">
                                    <template x-for="product in results" :key="product.id">
                                        <div class="col">
                                            <div class="product-card">
                                                <div class="pc__img-wrapper">
                                                    <a :href="`/products/${product.slug}`">
                                                        <img :src="product.image ? `/storage/${product.image}` :
                                                            'https://placehold.co/100x120'"
                                                            class="img-fluid w-100">
                                                    </a>
                                                </div>
                                                <div class="pc__info text-center mt-2">
                                                    <h6 class="pc__title fs-xs"><a :href="`/products/${product.slug}`"
                                                            x-text="product.name"></a></h6>
                                                    <div class="product-card__price d-flex justify-content-center">
                                                        <span class="money price"
                                                            x-text="'$' + parseFloat(product.price).toFixed(2)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @guest
                    {{-- Tampilkan ikon login jika pengguna adalah tamu --}}
                    <a href="{{ route('login') }}" class="header-tools__item">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                            <use href="#icon_user" />
                        </svg>
                    </a>
                @endguest

                @auth
                    {{-- Tampilkan form logout dengan ikon logout jika pengguna sudah login --}}
                    <form method="POST" action="{{ route('logout') }}" class="header-tools__item">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            title="Log Out">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 24 24">
                                <use href="#icon_logout" />
                            </svg>
                        </a>
                    </form>
                @endauth
                <a href="{{ route('cart.index') }}" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                        <use href="#icon_cart" />
                    </svg>
                    <span
                        class="cart-amount d-block position-absolute js-cart-items-count">{{ Cart::getTotalQuantity() }}</span>
                </a>
            </div>
        </div>
    </div>
</header>
