@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Contact Us</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Send us a message and we will reply as soon as possible.</p>
    </div>

    @auth
        <form action="{{ route('contact.send') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>
                </div>
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>{{ old('message') }}</textarea>
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

            <button type="submit" class="bg-gray-900 dark:bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition mt-6">Send Message</button>
        </form>
    @else
        <div class="bg-yellow-100 dark:bg-yellow-900 border border-yellow-400 dark:border-yellow-600 text-yellow-700 dark:text-yellow-300 px-4 py-3 rounded">
            You must be logged in to send a contact message. <a href="{{ route('login') }}" class="font-semibold underline text-yellow-800 dark:text-yellow-200">Login here</a>.
        </div>
    @endauth
</div>
@endsection
