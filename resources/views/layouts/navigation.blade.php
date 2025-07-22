{{-- Wrapper untuk state Alpine.js --}}
<div x-data="{ sidebarOpen: false }" class="relative">
    <!-- Bilah Navigasi Atas (Top Bar) -->
    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Tombol Hamburger -->
                    <div class="-me-2 flex items-center">
                        <button @click="sidebarOpen = true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Logo -->
                    <div class="shrink-0 flex items-center ml-4">
                        <a href="{{ route('dashboard') }}">
                            <img {{ $attributes ?? '' }} src="{{ asset('images/balmen-logo.png') }}" class="block h-9 w-auto" alt="Logo Aplikasi">
                        </a>
                    </div>
                </div>

                <!-- Dropdown Pengaturan Pengguna -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu Sidebar (Overlay) -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 flex" x-cloak>
        <!-- Latar Belakang Overlay -->
        <div @click="sidebarOpen = false" x-show="sidebarOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <!-- Konten Sidebar -->
        <aside class="relative flex-1 flex flex-col max-w-xs w-full bg-white"
             x-show="sidebarOpen"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full">

            <!-- Tombol Tutup -->
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Header Sidebar -->
            <div class="flex-shrink-0 flex items-center px-4 h-16 border-b">
                <a href="{{ route('dashboard') }}">
                    <img {{ $attributes ?? '' }} src="{{ asset('images/balmen-logo.png') }}" class="block h-9 w-auto" alt="Logo Aplikasi">
                </a>
            </div>

            <!-- Tautan Navigasi -->
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <!-- Dropdown Produk -->
                    <div x-data="{ open: request()->routeIs('admin.products.*') }">
                        <button @click="open = ! open" class="flex items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.products.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600' }} text-start text-base font-medium hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out">
                            <span class="flex-1">{{ __('Products') }}</span>
                            <svg class="ms-2 -me-0.5 h-4 w-4 transform transition-transform duration-200" :class="{'rotate-180': open, 'rotate-0': !open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-1 ps-5" x-collapse>
                            <x-responsive-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">{{ __('All Products') }}</x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('admin.products.create')" :active="request()->routeIs('admin.products.create')">{{ __('Add New') }}</x-responsive-nav-link>
                        </div>
                    </div>

                    <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                        {{ __('Categories') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.brands.index')" :active="request()->routeIs('admin.brands.*')">
                        {{ __('Brands') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.order')" :active="request()->routeIs('admin.order')">
                        {{ __('Order') }}
                    </x-responsive-nav-link>
                </nav>
            </div>
        </aside>
    </div>
</div>
