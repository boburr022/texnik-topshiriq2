<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 60, function () {
            return Post::with('tags')->get();
        });
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999',
            'tags' => 'array|exists:tags,id'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('images', 'public');
            $validated['image'] = $filename;
        }
        Cache::forget('posts');

        $post = Post::create($validated);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999',
            'tags' => 'array|exists:tags,id'
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $filename = $request->file('image')->store('images', 'public');
            $validated['image'] = $filename;
        }
        Cache::forget('posts');

        $post->update($validated);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        Cache::forget('posts');
        $post->delete();
        return redirect()->route('posts.index');
    }
}
