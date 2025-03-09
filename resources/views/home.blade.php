@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Latest Blog Posts</h1>
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h2>
                <p class="card-text">{{ Str::limit($post->content, 200) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{ $post->created_at->format('M d, Y') }} by {{ $post->author->name }}
            </div>
        </div>
    @endforeach
@endsection