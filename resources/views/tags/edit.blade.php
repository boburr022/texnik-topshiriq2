@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Edit Tag')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Tag</h1>
    <form action="{{ route('tags.update', $tag) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded-lg" value="{{ old('name', $tag->name) }}">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
