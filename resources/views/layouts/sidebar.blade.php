<!-- Sidebar -->
<aside class="flex-shrink-0 bg-white border-r transition-all duration-300"
    :class="{ 'w-64': sidebarOpen, 'w-20': !sidebarOpen }">
    <!-- Header Sidebar -->
    <div class="flex items-center justify-between h-16 px-4 border-b">
        <a href="{{ route('dashboard') }}" x-show="sidebarOpen" class="text-xl font-bold">
            <img {{ $attributes ?? '' }} src="{{ asset('assets/images/balmen-logo.png') }}" class="block h-9 w-auto"
                alt="Logo Aplikasi">
        </a>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Tautan Navigasi -->
    <nav class="mt-4 px-2" x-data="{ openDropdown: '' }">
        <h3 x-show="sidebarOpen" class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Main Menu
        </h3>

        <a href="{{ route('dashboard') }}"
            class="mt-2 flex items-center px-4 py-2 text-gray-700 rounded-md {{ request()->routeIs('dashboard') ? 'bg-gray-200' : '' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
        </a>

        <!-- Dropdown Produk -->
        <div x-data="{ open: request() - > routeIs('admin.products.*') }">
            <button @click="open = !open"
                class="w-full mt-2 flex items-center justify-between px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md">
                <div class="flex items-center">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3">Products</span>
                </div>
                <svg x-show="sidebarOpen" class="h-5 w-5 transform transition-transform" :class="{ 'rotate-180': open }"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse class="pl-8 py-2">
                <a href="{{ route('admin.products.index') }}"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-md">All Products</a>
                <a href="{{ route('admin.products.create') }}"
                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-md">Add New</a>
            </div>
        </div>

        <!-- Tautan Kategori -->
        <a href="{{ route('admin.categories.index') }}"
            class="mt-2 flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-gray-200' : '' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span x-show="sidebarOpen" class="ml-3">Categories</span>
        </a>

        <!-- Tautan Brand -->
        <a href="{{ route('admin.brands.index') }}"
            class="mt-2 flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.brands.*') ? 'bg-gray-200' : '' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span x-show="sidebarOpen" class="ml-3">Brands</span>
        </a>

        <!-- Tautan Order -->
        <a href="{{ route('admin.orders.index') }}"
            class="mt-2 flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.order') ? 'bg-gray-200' : '' }}">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span x-show="sidebarOpen" class="ml-3">Order</span>
        </a>

    </nav>
</aside>
