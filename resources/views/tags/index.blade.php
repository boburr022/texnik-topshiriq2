@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'All Tags')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All Tags</h1>
    <a href="{{ route('tags.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Tag</a>
    <a href="{{ route('main') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back To Home</a>
    <div class="mt-6">
        @foreach($tags as $tag)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h2 class="text-xl font-bold mb-2">{{ $tag->name }}</h2>
                <a href="{{ route('tags.show', $tag) }}" class="text-blue-500">View</a>
                <a href="{{ route('tags.edit', $tag) }}" class="text-blue-500 ml-2">Edit</a>
                <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
