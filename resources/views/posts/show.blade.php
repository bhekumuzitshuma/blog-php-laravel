@extends('layouts.app')

@section('content')
<div class="max-w-5xl text-gray-200 mx-auto py-10">
    <h1 class="text-4xl font-light">{{ $post->title }}</h1>
    <p class="text-muted text-xs my-3 p-1 font-thin w-fit rounded border border-gray-600 bg-gray-800">By {{ $post->user->name }} | {{ $post->created_at->format('M d, Y') }}</p>
    <hr class="border-gray-600 mb-2"/>
    <div>
        <p class="text-gray-300">{{ $post->content }}</p>
    </div>

    <div class="rounded-lg border mt-5 p-6 border-gray-700 bg-gray-900 shadow-lg">
        <h4 class="text-2xl font-bold text-white mb-4">Comments</h4>
        <div class="space-y-4">
            @foreach($post->comments as $comment)
            <div class="rounded-lg bg-gray-800 p-4 border border-gray-700">
                <p class="text-sm text-gray-400 mb-1">
                    <strong class="text-blue-400 lowercase">{{"@"}}{{ $comment->user->name }}</strong> 
                    <span class="text-gray-500">• {{ $comment->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-gray-300">{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
    

    <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-6 space-y-4">
        @csrf
        <div class="form-group">
            <textarea 
                name="content" 
                class="w-full p-3 rounded-lg border border-gray-700 bg-gray-800 text-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" 
                rows="3" 
                placeholder="Add a comment..."></textarea>
        </div>
        <x-primary-button class="">
            Post Comment
        </x-primary-button>
        
    </form>
    
</div>
@endsection
