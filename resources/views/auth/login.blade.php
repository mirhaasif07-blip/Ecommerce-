@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Login</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Access your account to manage orders or use the admin dashboard if you are an administrator.</p>
    </div>

    <form action="{{ route('login.submit') }}" method="post">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                @error('email')<div class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                <input id="password" name="password" type="password" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                @error('password')<div class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center gap-2">
                <input id="remember" name="remember" type="checkbox" class="rounded" />
                <label for="remember" class="text-sm text-gray-700 dark:text-gray-300">Remember me</label>
            </div>
        </div>
        <button type="submit" class="w-full bg-gray-900 dark:bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition mt-6">Login</button>
    </form>

    <p class="text-gray-600 dark:text-gray-300 mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Create one</a>.</p>
</div>
@endsection
