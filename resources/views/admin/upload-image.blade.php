@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm max-w-md mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Upload Product Image</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Select a product and upload an image file.</p>
    </div>

    <form action="{{ route('admin.upload-image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product</label>
            <select id="product_id" name="product_id" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image File</label>
            <input id="image" name="image" type="file" accept="image/*" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400 file:bg-gray-50 dark:file:bg-gray-600 file:border-0 file:rounded file:px-2 file:py-1 file:mr-2" required>
        </div>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <button type="submit" class="w-full bg-gray-900 dark:bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition">Upload Image</button>
    </form>

    <a href="{{ route('admin.index') }}" class="block text-center mt-4 text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100">Back to Admin</a>
</div>
@endsection