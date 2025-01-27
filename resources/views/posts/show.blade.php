@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">By {{ $post->user->name }} | {{ $post->created_at->format('M d, Y') }}</p>
    <div>
        <p>{{ $post->content }}</p>
    </div>

    <h4>Comments</h4>
    <div>
        @foreach($post->comments as $comment)
            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
        @endforeach
    </div>

    <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
    </form>
</div>
@endsection
