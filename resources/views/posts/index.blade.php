@extends('layouts.app')

@section('content')
<div class="max-w-[1080px] text-gray-300 mx-auto flex">
    <!-- Left Sidebar -->
    <aside class="w-[20%] border-r border-gray-600 p-8 hidden md:block pr-4">
        <h2 class="mb-4 text-lg font-semibold">Categories</h2>
        <ul class="list-disc pl-5">
            @foreach($categories as $category)
                <li><a href="{{ route('categories.show', $category) }}" class="text-blue-500">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="w-full p-8 md:w-[80%]">
        <h1 class="mb-4 text-2xl font-bold">All Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        @endauth
    
        @if($posts->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($posts as $post)
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                            </svg>
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </span>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $post->excerpt }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full" src="{{ $post->user->profile_image ?? 'https://via.placeholder.com/150' }}" alt="{{ $post->user->name }} avatar" />
                            <span class="font-medium dark:text-white">
                                {{ $post->user->name }}
                            </span>
                        </div>
                        <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
                
            </div>
            <div class="mt-4">
                {{ $posts->links() }} <!-- Pagination -->
            </div>
        @else
            <p>No posts found.</p>
        @endif
    </div>
</div>
@endsection