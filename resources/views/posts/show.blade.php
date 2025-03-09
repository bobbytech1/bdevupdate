@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <div class="card-footer text-muted">
            Posted on {{ $post->created_at->format('M d, Y') }} by {{ $post->author->name }}
        </div>
    </div>

    <h3>Comments</h3>
    @foreach ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
            </div>
            <div class="card-footer text-muted">
                Commented by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}
            </div>
        </div>
    @endforeach

    @auth
        <h3>Add a Comment</h3>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Your comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endauth
@endsection