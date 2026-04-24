<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Ecommerce Pro') }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    @stack('head')
</head>
<body class="min-h-screen bg-slate-100 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <header class="mb-8 rounded-3xl border border-slate-200/80 bg-white/90 dark:border-slate-800/80 dark:bg-slate-900/90 shadow-sm shadow-slate-200/50 dark:shadow-slate-950/40 backdrop-blur-md">
            <div class="flex flex-wrap justify-between items-center gap-4 px-6 py-4">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Ecommerce Pro</a>
            </div>
            <nav class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Products</a>
                <a href="{{ route('checkout.index') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Checkout</a>
                <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Contact</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Admin</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white font-medium">Register</a>
                @endauth
                <button id="theme-toggle" class="ml-4 p-2 rounded-lg bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 transition-colors">
                    <svg id="sun-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg id="moon-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>
            </nav>
        </header>

        @if(session('success'))
            <div class="bg-emerald-100 dark:bg-emerald-900 border border-emerald-400 dark:border-emerald-700 text-emerald-700 dark:text-emerald-200 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="bg-rose-100 dark:bg-rose-900 border border-rose-400 dark:border-rose-700 text-rose-700 dark:text-rose-200 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <main class="space-y-8">
            @yield('content')
        </main>

        <footer class="mt-16 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Ecommerce Pro</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">
                            Your trusted partner for modern online shopping. Quality products, secure checkout, and exceptional customer service.
                        </p>
                        <div class="flex space-x-4">
                            <!-- Social Media Icons (placeholders) -->
                            <a href="#" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.749.097.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.017z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.253 14.894 3.762 13.743 3.762 12.446s.49-2.448 1.364-3.323c.875-.875 2.026-1.365 3.323-1.365s2.448.49 3.323 1.365c.875.875 1.365 2.026 1.365 3.323s-.49 2.448-1.365 3.323c-.875.807-2.026 1.297-3.323 1.297zm7.718 0c-.906 0-1.683-.245-2.354-.735.245-.49.49-.98.735-1.47.49.245.98.49 1.47.49.49 0 .98-.245 1.47-.49.245.49.49.98.735 1.47-.671.49-1.448.735-2.354.735z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Quick Links</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('home') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Home</a></li>
                            <li><a href="{{ route('products.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Products</a></li>
                            <li><a href="{{ route('checkout.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Checkout</a></li>
                            <li><a href="{{ route('contact.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Customer Service -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Customer Service</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('contact.index') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Help & Support</a></li>
                            <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Shipping Info</a></li>
                            <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Returns & Exchanges</a></li>
                            <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Size Guide</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Contact Info</h3>
                        <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <p>📧 support@ecommercepro.com</p>
                            <p>📞 +1 (555) 123-4567</p>
                            <p>📍 123 Commerce St, Business City, BC 12345</p>
                            <p>🕒 Mon-Fri: 9AM-6PM EST</p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="border-t border-slate-200 dark:border-slate-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-sm text-slate-600 dark:text-slate-400">
                        © {{ date('Y') }} Ecommerce Pro. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');
        const body = document.body;

        // Check for saved theme preference or default to light mode
        let currentTheme = localStorage.getItem('theme') || 'light';

        // Force light mode if no preference is set (for fresh installs)
        if (!localStorage.getItem('theme')) {
            currentTheme = 'light';
            localStorage.setItem('theme', 'light');
        }

        if (currentTheme === 'dark') {
            body.classList.add('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        } else {
            body.classList.remove('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        }

        // Toggle theme on button click
        themeToggle.addEventListener('click', () => {
            if (body.classList.contains('dark')) {
                body.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
