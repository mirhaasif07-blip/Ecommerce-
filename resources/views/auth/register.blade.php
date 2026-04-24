@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Signup</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Create your account to place orders or access the admin panel if approved.</p>
    </div>

    <form action="{{ route('register.submit') }}" method="post">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                @error('name')<div class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
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
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
            </div>
        </div>
        <button type="submit" class="w-full bg-gray-900 dark:bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition mt-6">Create Account</button>
    </form>

    <p class="text-gray-600 dark:text-gray-300 mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="font-semibold text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Login</a>.</p>
</div>
@endsection
