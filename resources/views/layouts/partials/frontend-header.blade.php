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
</svg>
<symbol id="icon_close" viewBox="0 0 12 12">
    <path d="M0.311322 10.6261L10.9374 0L12 1.06261L1.37393 11.6887L0.311322 10.6261Z" fill="currentColor" />
    <path d="M1.06261 0.106781L11.6887 10.7329L10.6261 11.7955L0 1.16939L1.06261 0.106781Z" fill="currentColor" />
</symbol>
</svg>

<header id="header" class="header header-fullwidth">
    <div class="container">
        <div class="header-desk header-desk_type_1" x-data="{ searchActive: false, query: '', results: [], loading: false }">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/balmen-logo.png') }}" alt="Balmen" class="logo__image d-block"
                        style="max-height: 40px;" />
                </a>
            </div>

            <!-- Navigasi (Tampil saat pencarian tidak aktif) -->
            <nav class="navigation" x-show="!searchActive" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item"><a href="{{ url('/') }}" class="navigation__link">Home</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link">Shop</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link">Categories</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link">Contact</a></li>
                </ul>
            </nav>

            <!-- Form Pencarian (Tampil saat pencarian aktif) -->
            <div x-show="searchActive" class="flex-grow-1 mx-4 position-relative" x-cloak
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <form class="search-field" @submit.prevent>
                    <input x-ref="searchInput" x-model.debounce.300ms="query"
                        @input.debounce.300ms="if (query.length > 2) {
                                loading = true;
                                results = [];
                                fetch('{{ route('products.search') }}?query=' + query)
                                    .then(res => res.json())
                                    .then(data => { results = data; loading = false; })
                                    .catch(() => { loading = false; });
                            } else { results = []; }"
                        class="search-field__input w-100" type="text" name="search-keyword"
                        placeholder="Search products">
                    <button class="btn-icon search-popup__submit" type="submit">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                            <use href="#icon_search" />
                        </svg>
                    </button>
                    <!-- Hasil Pencarian -->
                    <div x-show="query.length > 2" @click.away="query = ''; results = []"
                        class="search-popup__results position-absolute top-100 start-0 w-100 bg-white shadow-lg rounded-b-lg p-3"
                        x-cloak>
                        {{-- <div x-show="loading" class="text-center text-secondary py-2">Searching...</div>
                        <div x-show="!loading && results.length === 0" class="text-center text-secondary py-2">No
                            results found.</div> --}}
                        {{-- <div x-show="!loading && results.length > 0">
                            <template x-for="product in results" :key="product.id">
                                <a :href="`/products/${product.slug}`"
                                    class="d-flex align-items-center p-2 text-decoration-none border-bottom">
                                    <img :src="product.image ? `/storage/${product.image}` : 'https://placehold.co/50x50'"
                                        class="w-12 h-12 object-cover rounded-md me-3"
                                        style="width: 50px; height: 50px;">
                                    <div>
                                        <div class="fw-bold text-dark" x-text="product.name"></div>
                                        <div class="text-sm text-secondary"
                                            x-text="'$' + parseFloat(product.price).toFixed(2)"></div>
                                    </div>
                                </a>
                            </template>
                        </div> --}}
                    </div>
                </form>
            </div>

            <div class="header-tools d-flex align-items-center">
                <a href="#"
                    @click.prevent="searchActive = !searchActive; if(!searchActive) { query = '' }; $nextTick(() => { if(searchActive) $refs.searchInput.focus() })"
                    class="header-tools__item">
                    <svg x-show="!searchActive" class="d-block" width="20" height="20" viewBox="0 0 20 20">
                        <use href="#icon_search" />
                    </svg>
                    <svg x-show="searchActive" class="d-block" width="12" height="12" viewBox="0 0 12 12">
                        <use href="#icon_close" />
                    </svg>
                </a>
                <a href="{{ route('login') }}" class="header-tools__item">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                        <use href="#icon_user" />
                    </svg>
                </a>
                <a href="#" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20">
                        <use href="#icon_cart" />
                    </svg>
                    <span class="cart-amount d-block position-absolute js-cart-items-count">0</span>
                </a>
            </div>
        </div>
    </div>
</header>
