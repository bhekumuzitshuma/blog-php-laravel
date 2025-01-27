@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

    @if($categories->count())
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No categories available.</p>
    @endif
</div>
@endsection
