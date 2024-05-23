@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'All Posts')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All Posts</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Post</a>
    <div class="mt-6">
        @foreach($posts as $post)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->body }}</p>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500">View</a>
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 ml-2">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
