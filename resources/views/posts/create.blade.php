@vite('resources/css/app.css')

@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="max-w-md mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" class="w-full border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500" value="{{ old('title') }}" style="color: blue;">
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Body</label>
                <textarea name="body" class="w-full border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500" style="color: green;">{{ old('body') }}</textarea>
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
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded">Create</button>
        </form>
    </div>
@endsection
