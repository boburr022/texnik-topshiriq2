@vite('resources/css/app.css')

@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border-gray-300 rounded-lg" value="{{ old('title') }}">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Body</label>
            <textarea name="body" class="w-full border-gray-300 rounded-lg">{{ old('body') }}</textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image" class="w-full">
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tags</label>
            <select name="tags[]" class="w-full border-gray-300 rounded-lg" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
    </form>
@endsection
