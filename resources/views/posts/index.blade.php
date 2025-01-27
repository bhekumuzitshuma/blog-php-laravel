@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if($posts->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->name ?? 'Uncategorized' }}</td>
                    <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }} <!-- Pagination -->
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
