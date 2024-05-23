@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Create Tag')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded-lg" value="{{ old('name') }}">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        <a href="{{ route('tags.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back To Home</a>
    </form>
@endsection
