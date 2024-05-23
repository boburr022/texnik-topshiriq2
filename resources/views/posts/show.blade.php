@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', $post->title)

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-gray-700">{{ $post->body }}</p>
        @if($post->image)
            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="mt-4">
        @endif
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Tags:</h3>
            <ul>
                @foreach($post->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
