<x-app-layout>
    {{-- Menambahkan CSS Tom Select untuk halaman ini --}}
    <x-slot name="head">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Kolom Kiri: Detail Produk -->
                    <div class="lg:w-2/3">
                        <div class="bg-white shadow-md sm:rounded-lg p-6">
                            <div class="space-y-6">
                                <!-- Product Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                                    <textarea id="description" name="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $product->description) }}</textarea>
                                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Price & Stock -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price <span class="text-red-500">*</span></label>
                                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock <span class="text-red-500">*</span></label>
                                        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <!-- SKU & Fit Type -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                                        <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @error('sku') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="fit_type" class="block text-sm font-medium text-gray-700">Fit Type</label>
                                        <select id="fit_type" name="fit_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option value="regular" @if(old('fit_type', $product->fit_type) == 'regular') selected @endif>Regular</option>
                                            <option value="slim_fit" @if(old('fit_type', $product->fit_type) == 'slim_fit') selected @endif>Slim Fit</option>
                                            <option value="oversize" @if(old('fit_type', $product->fit_type) == 'oversize') selected @endif>Oversize</option>
                                        </select>
                                        @error('fit_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <!-- Categories -->
                                <div>
                                    <label for="categories" class="block text-sm font-medium text-gray-700">Categories <span class="text-red-500">*</span></label>
                                    <select id="categories" name="categories[]" multiple class="mt-1 block w-full">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(in_array($category->id, $product->categories->pluck('id')->toArray())) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Brand -->
                                <div>
                                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand</label>
                                    <select id="brand_id" name="brand_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Choose brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if(old('brand_id', $product->brand_id) == $brand->id) selected @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Upload Gambar -->
                    <div class="lg:w-1/3 space-y-6">
                        <div class="bg-white shadow-md sm:rounded-lg p-6">
                             <h3 class="text-lg font-medium leading-6 text-gray-900">Product Image</h3>
                             @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width: 500px; height: auto;" class="mt-2 rounded-md w-full h-auto">
                             @endif
                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Change Image</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            </div>
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="bg-white shadow-md sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Gallery Images</h3>

                            <!-- PERUBAHAN: Menggunakan checkbox untuk menghapus gambar -->
                            <div class="grid grid-cols-3 gap-4">
                                @foreach($product->images as $image)
                                    <div class="relative group">
                                        <img src="{{ Storage::url($image->image) }}" class="h-24 w-full object-cover rounded-md">
                                        <div class="absolute top-1 right-1 bg-white bg-opacity-75 rounded-full p-0.5">
                                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="h-4 w-4 rounded text-red-600 border-gray-300 focus:ring-red-500" title="Check to delete">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Input untuk menambah gambar baru -->
                            <div class="mt-4">
                                <label for="gallery_images" class="block text-sm font-medium text-gray-700">Add More Images</label>
                                <input type="file" name="gallery_images[]" id="gallery_images" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            </div>
                            @error('gallery_images.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
                <div class="pt-8 flex justify-end">
                    <a href="{{ route('admin.products.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Product</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.querySelector('#categories')) {
                new TomSelect('#categories',{
                    plugins: ['remove_button'],
                    create: false,
                    maxItems: 5
                });
            }
        });
    </script>
    @endpush
</x-app-layout>
