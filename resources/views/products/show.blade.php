@extends('layouts.app')

@section('content')
<div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-6 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40">
    <div class="flex flex-wrap justify-between items-start gap-4 mb-6">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-indigo-600 dark:text-indigo-300">Product details</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">{{ $product->name }}</h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">{{ $product->description }}</p>
        </div>
        <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-900 dark:bg-slate-800 dark:text-slate-100">₨{{ number_format($product->price, 2) }}</span>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.8fr_1fr]">
        <div>
            @php
                $image = $product->image_url;
                if (!$image) {
                    $image = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNzIwIiBoZWlnaHQ9IjQ4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMzAiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5ObyBJbWFnZTwvdGV4dD48L3N2Zz4=';
                } elseif (!preg_match('/^https?:\/\//', $image)) {
                    $image = asset($image);
                    if (!file_exists(public_path($product->image_url))) {
                        $image = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNzIwIiBoZWlnaHQ9IjQ4MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMzAiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5ObyBJbWFnZTwvdGV4dD48L3N2Zz4=';
                    }
                }
            @endphp
            <img src="{{ $image }}" alt="{{ $product->name }}" class="w-full rounded-[1.5rem] object-cover shadow-lg shadow-slate-200/40 dark:shadow-slate-950/40" />
        </div>
        <div class="space-y-6">
            <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-6 dark:border-slate-800/80 dark:bg-slate-950">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Availability</p>
                <p class="mt-3 text-lg font-semibold text-slate-900 dark:text-white">{{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}</p>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ $product->stock > 0 ? $product->stock . ' units available' : 'Please contact support for restock information.' }}</p>
            </div>
            <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-6 dark:border-slate-800/80 dark:bg-slate-950">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Product description</p>
                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-400">{{ $product->description }}</p>
            </div>
            <a href="{{ route('checkout.index', ['product_id' => $product->id]) }}" class="inline-flex w-full items-center justify-center rounded-full bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/10 hover:bg-indigo-700 transition">Proceed to Checkout</a>
        </div>
    </div>
</div>
@endsection
