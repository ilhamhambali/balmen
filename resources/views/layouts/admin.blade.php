<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Balmen</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">
                <a href="{{ route('admin.dashboard') }}">Balmen Manage</a>
            </div>
            <nav class="flex-1 px-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Produk</a>
                <a href="{{ route('admin.categories.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Kategori</a>
            </nav>
            <div class="p-4">
                <!-- Logout Form -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="text-gray-700 text-3xl font-medium">@yield('title')</h3>

                    <!-- Pesan Sukses -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Konten Halaman -->
                    <div class="mt-4 bg-white p-6 rounded-lg shadow-md">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
