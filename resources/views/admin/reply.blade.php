@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reply to Message</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Respond to the user's contact message.</p>
    </div>

    <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Original Message</h2>
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">From: {{ $message->name }} ({{ $message->email }})</p>
        <p class="text-gray-800 dark:text-gray-200 mt-2">{{ $message->message }}</p>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Sent on: {{ $message->created_at->format('M d, Y H:i') }}</p>
    </div>

    <form action="{{ route('admin.messages.reply.store', $message) }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="reply" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Reply</label>
            <textarea id="reply" name="reply" rows="6" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-400" required>{{ old('reply', $message->reply) }}</textarea>
            @error('reply')<div class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="bg-gray-900 dark:bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-600 transition">Send Reply</button>
        <a href="{{ route('admin.index') }}" class="ml-4 text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100">Cancel</a>
    </form>
</div>
@endsection