<x-frontend-layout>
    <main class="pt-90">
        <section class="shop-main container d-flex pt-4 pt-xl-5">
            <!-- Filter Sidebar -->
            <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
                <div class="aside-header d-flex d-lg-none align-items-center">
                    <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
                    <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
                </div>

                <div class="pt-4 pt-lg-0"></div>

                @if (request('category') || request('brand'))
                    <div class="mb-4">
                        <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary btn-sm w-100">Clear All
                            Filters</a>
                    </div>
                @endif

                <!-- Filter Kategori -->
                <div class="accordion" id="categories-list">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-1">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true"
                                aria-controls="accordion-filter-1">
                                Product Categories
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-1" class="accordion-collapse collapse show border-0">
                            <div class="accordion-body px-0 pb-0 pt-3">
                                <ul class="list list-inline mb-0">
                                    @foreach ($categories as $category)
                                        @if ($category->products_count > 0)
                                            <li class="list-item">
                                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                                    class="menu-link py-1 {{ request('category') == $category->slug ? 'fw-bold text-dark' : '' }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Brand -->
                <div class="accordion" id="brand-filters">
                    <div class="accordion-item mb-4 pb-3">
                        <h5 class="accordion-header" id="accordion-heading-brand">
                            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                                data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true"
                                aria-controls="accordion-filter-brand">
                                Brands
                                <svg class="accordion-button__icon type2" viewBox="0 0 10 6">
                                    <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                        <path
                                            d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                    </g>
                                </svg>
                            </button>
                        </h5>
                        <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0">
                            <div class="accordion-body px-0 pb-0">
                                <ul class="list-unstyled">
                                    @foreach ($brands as $brand)
                                        @if ($brand->products_count > 0)
                                            <li>
                                                <a href="{{ route('shop.index', ['brand' => $brand->slug]) }}"
                                                    class="d-flex justify-content-between text-decoration-none text-primary">
                                                    <span
                                                        class="me-auto {{ request('brand') == $brand->slug ? 'fw-bold text-dark' : '' }}">{{ $brand->name }}</span>
                                                    <span class="text-secondary">{{ $brand->products_count }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Produk -->
            <div class="shop-list flex-grow-1">
                <div class="d-flex justify-content-between mb-4 pb-md-2">
                    <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                        <a href="{{ url('/') }}" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                        <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                        <a href="{{ route('shop.index') }}"
                            class="menu-link menu-link_us-s text-uppercase fw-medium">Shop</a>
                    </div>
                </div>

                <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
                    @forelse ($products as $product)
                        <div class="product-card-wrapper">
                            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <a href="{{ route('shop.products.details', $product->slug) }}">
                                        <img loading="lazy"
                                            src="{{ $product->image ? Storage::url($product->image) : 'https://placehold.co/330x400' }}"
                                            width="330" height="400" alt="{{ $product->name }}" class="pc__img">
                                    </a>
                                </div>
                                <div class="pc__info position-relative">
                                    <p class="pc__category">
                                        {{ $product->categories->first()->name ?? 'Uncategorized' }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ route('shop.products.details', $product->slug) }}">{{ $product->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No products found for this filter.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="my-5 d-flex justify-content-center">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </section>
    </main>
</x-frontend-layout>
