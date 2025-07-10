<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col lg:flex-row gap-8">

                    <!-- Kolom Kiri: Detail Produk -->
                    <div class="lg:w-2/3">
                        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-6">Product Details</h3>
                            <div class="space-y-6">
                                <!-- Product Name -->
                                <div>
                                    <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product name <span class="text-red-500">*</span></label>
                                    <input type="text" name="product_name" id="product_name" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Do not exceed 100 characters when entering the product name.</p>
                                </div>

                                <!-- Slug -->
                                <div>
                                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug <span class="text-red-500">*</span></label>
                                    <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Do not exceed 100 characters when entering the product name.</p>
                                </div>

                                <!-- Category & Brand -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category <span class="text-red-500">*</span></label>
                                        <select id="category" name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                            <option>Choose category</option>
                                            <option>Category 1</option>
                                            <option>Category 2</option>
                                            <option>Category 3</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand <span class="text-red-500">*</span></label>
                                        <select id="brand" name="brand" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                            <option>Choose Brand</option>
                                            <option>Brand 1</option>
                                            <option>Brand 2</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <div>
                                    <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short Description <span class="text-red-500">*</span></label>
                                    <textarea id="short_description" name="short_description" rows="4" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Upload Gambar -->
                    <div class="lg:w-1/3 space-y-8">
                        <!-- Upload Image -->
                        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-6">Upload images <span class="text-red-500">*</span></h3>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                        <label for="file-upload" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>click to browse</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drop your images here</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                        <!-- Upload Gallery -->
                        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-6">Upload Gallery Images</h3>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                        <label for="gallery-upload" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>click to browse</span>
                                            <input id="gallery-upload" name="gallery-upload[]" type="file" class="sr-only" multiple>
                                        </label>
                                        <p class="pl-1">or drop your images here</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-8 flex justify-end">
                    <button type="button" class="bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
