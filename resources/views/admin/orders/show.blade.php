<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order Details: {{ $order->order_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kolom Kiri: Detail Pesanan & Status -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Detail Item Produk -->
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b">
                            <h3 class="text-lg font-medium text-gray-900">Order Items</h3>
                        </div>
                        <div class="p-6">
                            <ul role="list" class="divide-y divide-gray-200">
                                @foreach ($order->items as $item)
                                    <li class="py-4 flex">
                                        <img src="{{ $item->product->image ? Storage::url($item->product->image) : 'https://placehold.co/100x100' }}"
                                            alt="{{ $item->product->name }}" class="h-16 w-16 rounded-md object-cover">
                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>{{ $item->product->name }}</h3>
                                                    <p class="ml-4">
                                                        ${{ number_format($item->price * $item->quantity, 2) }}</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    ${{ number_format($item->price, 2) }} each</p>
                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <p class="text-gray-500">Qty {{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Info Pelanggan & Update Status -->
                <div class="space-y-6">
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900">Customer Details</h3>
                        <dl class="mt-4 space-y-2 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <dt>Name:</dt>
                                <dd>{{ $order->customer_name }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Email:</dt>
                                <dd>{{ $order->customer_email }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Phone:</dt>
                                <dd>{{ $order->phone_number }}</dd>
                            </div>
                            <dt class="mt-2 font-medium">Shipping Address:</dt>
                            <dd class="whitespace-pre-line">{{ $order->shipping_address }}</dd>
                        </dl>
                    </div>

                    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900">Update Status</h3>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST"
                            class="mt-4">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="pending" @if ($order->status == 'pending') selected @endif>Pending
                                </option>
                                <option value="processing" @if ($order->status == 'processing') selected @endif>Processing
                                </option>
                                <option value="shipped" @if ($order->status == 'shipped') selected @endif>Shipped
                                </option>
                                <option value="completed" @if ($order->status == 'completed') selected @endif>Completed
                                </option>
                                <option value="cancelled" @if ($order->status == 'cancelled') selected @endif>Cancelled
                                </option>
                            </select>
                            <button type="submit" class="mt-4 w-full btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
