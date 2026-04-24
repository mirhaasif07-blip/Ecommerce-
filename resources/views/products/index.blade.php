@extends('layouts.app')

@section('content')
<div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-6 shadow-sm shadow-slate-200/50 backdrop-blur-sm dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-indigo-600 dark:text-indigo-300">Product collection</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">Browse premium products</h1>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">Discover our curated selection of {{ $products->total() }} high-quality products.</p>
        </div>
        <a href="{{ route('checkout.index') }}" class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/10 hover:bg-indigo-700 transition">Checkout</a>
    </div>

    <!-- Search and Filter Bar -->
    <div class="mb-8 flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
            <form method="GET" class="relative">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-full pl-10 pr-4 py-3 rounded-full border border-slate-300 bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:focus:border-indigo-400 transition"
                >
                <svg class="absolute left-3 top-3.5 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>
        <div class="flex gap-2">
            <select name="sort" onchange="this.form.submit()" form="sortForm" class="px-4 py-3 rounded-full border border-slate-300 bg-white text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-white transition">
                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name A-Z</option>
                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest First</option>
            </select>
            <form id="sortForm" method="GET" class="hidden">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
            </form>
        </div>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @foreach($products as $product)
                <div class="group overflow-hidden rounded-3xl border border-slate-200/80 bg-slate-50 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800/80 dark:bg-slate-950 dark:shadow-slate-950/20">
                    @php
                        $image = $product->image_url;
                        if (!$image) {
                            $image = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDIwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMjAiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5ObyBJbWFnZTwvdGV4dD48L3N2Zz4=';
                        } elseif (!preg_match('/^https?:\/\//', $image)) {
                            $image = asset($image);
                            if (!file_exists(public_path($product->image_url))) {
                                $image = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDIwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMjAiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5ObyBJbWFnZTwvdGV4dD48L3N2Zz4=';
                            }
                        }
                    @endphp
                    <img src="{{ $image }}" alt="{{ $product->name }}" class="h-52 w-full rounded-3xl object-cover transition duration-300 group-hover:scale-105" />
                    <h2 class="mt-4 text-xl font-semibold text-slate-900 dark:text-white">{{ $product->name }}</h2>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ Str::limit($product->description, 100) }}</p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-900 dark:bg-slate-800 dark:text-slate-100">₨{{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('products.show', $product) }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition">View</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-slate-400 dark:text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No products found</h3>
            <p class="text-slate-600 dark:text-slate-400 mb-6">Try adjusting your search or browse all products.</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-700 transition">
                Browse All Products
            </a>
        </div>
    @endif
</div>
@endsection
