@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 mb-16">
    <div class="grid gap-6 lg:grid-cols-[1.4fr_1fr]">
        <div class="px-8 py-12 lg:px-12 lg:py-16">
            <span class="inline-flex rounded-full bg-indigo-100 px-4 py-1 text-sm font-semibold text-indigo-700 dark:bg-indigo-200/10 dark:text-indigo-200">Trusted online storefront</span>
            <h1 class="mt-6 max-w-3xl text-5xl font-semibold tracking-tight text-slate-900 dark:text-white">Elevate your shopping experience with premium products and polished order flow.</h1>
            <p class="mt-6 text-lg leading-8 text-slate-600 dark:text-slate-300">Discover curated products, professional checkout, and a modern admin panel. Designed for high-converting stores and a seamless customer journey.</p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-slate-200 transition">Shop Now</a>
                <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 hover:border-slate-400 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:border-slate-500 transition">Contact Us</a>
            </div>
            <div class="mt-12 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-5 text-sm dark:border-slate-800/80 dark:bg-slate-950">
                    <h3 class="font-semibold text-slate-900 dark:text-white">Secure billing</h3>
                    <p class="mt-2 text-slate-600 dark:text-slate-400">Protect customer purchases with reliable checkout handling.</p>
                </div>
                <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-5 text-sm dark:border-slate-800/80 dark:bg-slate-950">
                    <h3 class="font-semibold text-slate-900 dark:text-white">Admin efficiency</h3>
                    <p class="mt-2 text-slate-600 dark:text-slate-400">Manage products, messages, and orders from one modern dashboard.</p>
                </div>
                <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-5 text-sm dark:border-slate-800/80 dark:bg-slate-950">
                    <h3 class="font-semibold text-slate-900 dark:text-white">Fast browsing</h3>
                    <p class="mt-2 text-slate-600 dark:text-slate-400">Quick product discovery through clean cards and easy navigation.</p>
                </div>
            </div>
        </div>
        <div class="hidden lg:block bg-[radial-gradient(circle_at_top_right,_rgba(79,70,229,0.15),_transparent_35%),linear-gradient(180deg,_rgba(252,211,77,0.15),_rgba(0,0,0,0))] p-8">
            <div class="rounded-[1.75rem] border border-white/60 bg-white/80 p-6 shadow-xl shadow-slate-900/10 backdrop-blur-xl dark:border-slate-700/80 dark:bg-slate-950/80">
                <h2 class="text-2xl font-semibold text-slate-900 dark:text-white">Why Choose Us?</h2>
                <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">Experience the difference with our premium service.</p>
                <div class="mt-6 space-y-4">
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-4 shadow-sm dark:border-slate-800/80 dark:bg-slate-900">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Quality Guaranteed</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">Premium products only</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-4 shadow-sm dark:border-slate-800/80 dark:bg-slate-900">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Fast Delivery</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">Same day shipping</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-4 shadow-sm dark:border-slate-800/80 dark:bg-slate-900">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">24/7 Support</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">Always here to help</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-semibold text-slate-900 dark:text-white mb-4">Featured Products</h2>
        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Discover our handpicked selection of premium products chosen for their exceptional quality and value.</p>
    </div>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($featured->take(6) as $product)
            <div class="group rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 overflow-hidden hover:shadow-lg hover:shadow-slate-200/60 dark:hover:shadow-slate-950/50 transition-all duration-300">
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
                <!-- Product Image -->
                <div class="aspect-square overflow-hidden">
                    <img src="{{ $image }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" />
                </div>

                <!-- Product Info -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $product->name }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-300 mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>

                    <div class="flex items-center justify-between">
                        <div class="text-xl font-bold text-indigo-600 dark:text-indigo-400">₨{{ number_format($product->price, 2) }}</div>
                        <a href="{{ route('products.show', $product) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 transition-colors">
                            <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 text-slate-400 dark:text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No featured products yet</h3>
                <p class="text-slate-600 dark:text-slate-400">We're working on adding amazing products to our collection.</p>
            </div>
        @endforelse
    </div>

    @if($featured->count() > 0)
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-8 py-4 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-slate-200 transition">
                View All Products
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    @endif
</div>

<!-- Statistics Section -->
<div class="mb-16">
    <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 lg:p-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold text-slate-900 dark:text-white mb-4">Trusted by thousands of customers</h2>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Join our growing community of satisfied shoppers who choose quality and convenience.</p>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">10K+</div>
                <div class="text-sm text-slate-600 dark:text-slate-400">Happy Customers</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">500+</div>
                <div class="text-sm text-slate-600 dark:text-slate-400">Products Available</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">99.9%</div>
                <div class="text-sm text-slate-600 dark:text-slate-400">Uptime Guarantee</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">24/7</div>
                <div class="text-sm text-slate-600 dark:text-slate-400">Customer Support</div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-semibold text-slate-900 dark:text-white mb-4">Why choose Ecommerce Pro?</h2>
        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Experience the difference with our premium features designed for modern online shopping.</p>
    </div>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- Feature 1 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Quality Assurance</h3>
            <p class="text-slate-600 dark:text-slate-300">Every product undergoes rigorous quality checks to ensure you receive only the best items that meet our high standards.</p>
        </div>

        <!-- Feature 2 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Secure Payments</h3>
            <p class="text-slate-600 dark:text-slate-300">Your financial information is protected with bank-level security encryption and multiple payment options for your convenience.</p>
        </div>

        <!-- Feature 3 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Lightning Fast</h3>
            <p class="text-slate-600 dark:text-slate-300">Optimized for speed with fast loading times, quick checkout process, and instant order confirmations.</p>
        </div>

        <!-- Feature 4 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">24/7 Support</h3>
            <p class="text-slate-600 dark:text-slate-300">Our dedicated support team is available around the clock to help you with any questions or concerns you may have.</p>
        </div>

        <!-- Feature 5 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Free Shipping</h3>
            <p class="text-slate-600 dark:text-slate-300">Enjoy free shipping on all orders over ₨500. Fast and reliable delivery to get your products to you quickly and safely.</p>
        </div>

        <!-- Feature 6 -->
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 text-center">
            <div class="w-16 h-16 bg-red-100 dark:bg-red-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Customer First</h3>
            <p class="text-slate-600 dark:text-slate-300">Your satisfaction is our priority. We offer hassle-free returns, easy exchanges, and a 30-day money-back guarantee.</p>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="mb-16">
    <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 lg:p-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold text-slate-900 dark:text-white mb-4">What our customers say</h2>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Don't just take our word for it - hear from our satisfied customers.</p>
        </div>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Testimonial 1 -->
            <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-6 dark:border-slate-800/80 dark:bg-slate-950">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
                <p class="text-slate-600 dark:text-slate-300 mb-4">"Amazing shopping experience! The products are high quality and the delivery was super fast. Will definitely shop here again."</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center mr-3">
                        <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">SM</span>
                    </div>
                    <div>
                        <div class="font-semibold text-slate-900 dark:text-white">Sarah Mitchell</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">Verified Customer</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-6 dark:border-slate-800/80 dark:bg-slate-950">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
                <p class="text-slate-600 dark:text-slate-300 mb-4">"The customer service is outstanding. They helped me with my order and were very responsive. Highly recommend!"</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center mr-3">
                        <span class="text-sm font-semibold text-green-600 dark:text-green-400">JD</span>
                    </div>
                    <div>
                        <div class="font-semibold text-slate-900 dark:text-white">John Davis</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">Verified Customer</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="rounded-3xl border border-slate-200/80 bg-slate-50 p-6 dark:border-slate-800/80 dark:bg-slate-950">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
                <p class="text-slate-600 dark:text-slate-300 mb-4">"Beautiful website design and easy to navigate. Found exactly what I was looking for and the checkout process was seamless."</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center mr-3">
                        <span class="text-sm font-semibold text-purple-600 dark:text-purple-400">ER</span>
                    </div>
                    <div>
                        <div class="font-semibold text-slate-900 dark:text-white">Emma Rodriguez</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">Verified Customer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="mb-16">
    <div class="rounded-[2rem] bg-gradient-to-r from-indigo-600 to-purple-600 p-8 lg:p-12 text-center text-white">
        <h2 class="text-3xl font-semibold mb-4">Stay updated with our latest offers</h2>
        <p class="text-lg mb-8 opacity-90 max-w-2xl mx-auto">Subscribe to our newsletter and be the first to know about new products, exclusive deals, and special promotions.</p>
        <form class="max-w-md mx-auto flex gap-4">
            <input type="email" placeholder="Enter your email address" class="flex-1 px-4 py-3 rounded-full border-0 focus:ring-2 focus:ring-white focus:ring-opacity-50 text-slate-900">
            <button type="submit" class="px-6 py-3 bg-white text-indigo-600 rounded-full font-semibold hover:bg-gray-100 transition">Subscribe</button>
        </form>
        <p class="text-sm mt-4 opacity-75">We respect your privacy. Unsubscribe at any time.</p>
    </div>
</div>

<!-- Final CTA Section -->
<div class="text-center">
    <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900/90 dark:shadow-slate-950/40 p-8 lg:p-12">
        <h2 class="text-3xl font-semibold text-slate-900 dark:text-white mb-4">Ready to start shopping?</h2>
        <p class="text-lg text-slate-600 dark:text-slate-300 mb-8 max-w-2xl mx-auto">Browse our extensive collection of premium products and experience the difference of professional online shopping.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-8 py-4 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-slate-200 transition">
                Browse Products
            </a>
            <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-8 py-4 text-sm font-semibold text-slate-900 hover:border-slate-400 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:border-slate-500 transition">
                Get in Touch
            </a>
        </div>
    </div>
</div>
@endsection
