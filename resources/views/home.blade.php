@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="text-center py-10">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">Welcome to the Blog!</h1>
        <p class="mt-4 text-gray-600 dark:text-gray-400">
            Explore the latest posts and stay updated with fresh content.
        </p>
    </div>

    <!-- Call to Action for Guests -->
    @guest
    <div class="text-center mt-6">
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Login
        </a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
            Register
        </a>
    </div>
    @endguest

    <!-- Blog Posts Section -->
    <div class="mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Latest Posts</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        {{ Str::limit($post->content, 100) }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                            Read More
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">
                    No posts yet. Stay tuned for new content!
                </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
