@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Checkout</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Complete your purchase by entering your details below.</p>
    </div>

    <form action="{{ route('checkout.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
            </div>
            <div class="md:col-span-2 lg:col-span-3">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                <textarea id="address" name="address" rows="3" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>{{ old('address') }}</textarea>
            </div>
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product</label>
                <select id="product_id" name="product_id" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                    <option value="">Select a product</option>
                    @foreach(App\Models\Product::orderBy('name')->get() as $product)
                        <option value="{{ $product->id }}" @selected(old('product_id') == $product->id || request('product_id') == $product->id)>
                            {{ $product->name }} - ₨{{ number_format($product->price, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                <input id="quantity" name="quantity" type="number" min="1" value="{{ old('quantity', 1) }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-300 px-4 py-3 rounded mt-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="bg-gray-900 dark:bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition mt-6">Place Order</button>
    </form>
</div>
@endsection
