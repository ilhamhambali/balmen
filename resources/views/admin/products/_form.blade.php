@csrf
<div class="space-y-6">
    <!-- Nama Produk -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Deskripsi -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('description', $product->description ?? '') }}</textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Harga -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <!-- Stok -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Kategori -->
    <div>
        <label for="categories" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="categories[]" id="categories" multiple class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ in_array($category->id, old('categories', isset($product) ? $product->categories->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <small class="text-gray-500">Tahan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu.</small>
        @error('categories') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Gambar Produk -->
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @isset($product)
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current image" class="h-24 w-24 object-cover rounded">
                    <small>Gambar saat ini. Unggah file baru untuk menggantinya.</small>
                </div>
            @endif
        @endisset
        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
</div>

<div class="flex justify-end mt-6">
    <a href="{{ route('admin.products.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700 mr-2">Batal</a>
    <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
        {{ isset($product) ? 'Perbarui Produk' : 'Simpan Produk' }}
    </button>
</div>
