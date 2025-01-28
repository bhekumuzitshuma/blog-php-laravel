@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Posts in {{ $category->name }}</h1>

    @if($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($posts as $post)
                <div class="border rounded-lg p-4 shadow">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500">{{ $post->title }}</a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-1">By {{ $post->user->name }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }} <!-- Pagination -->
        </div>
    @else
        <p>No posts found in this category.</p>
    @endif
</div>
@endsection
