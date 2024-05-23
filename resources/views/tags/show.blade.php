@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', $tag->name)

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $tag->name }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold">Posts:</h3>
        <ul>
            @foreach($tag->posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
