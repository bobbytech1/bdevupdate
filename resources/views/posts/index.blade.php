@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Manage Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create New Post</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <!-- Read More Button -->
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Read More</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection