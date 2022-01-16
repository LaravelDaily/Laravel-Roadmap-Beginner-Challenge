<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostResquest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;

class AdminPostController extends Controller
{

    public function index()
    {
        $posts = Post::with('tags', 'category')->latest()->simplePaginate(5);

        return view('admin.posts.index', compact(['posts']));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(StorePostResquest $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image')->store('images');
        }

        $post = Post::create($request->except('tags', 'image') + ['user_id' => \Auth::id(), 'image' => $image]);

        foreach ($request['tags'] as $tag) {
            $tag = Tag::firstOrNew(['name' => $tag]);
            $tag->slug = $tag->name;
            $tag->save();
            $post->tags()->attach($tag);
        }

        return redirect()->route('posts.index')->with('success', 'Post has been created');
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact(['post']));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->except('tags'));

        $tags = [];
        foreach ($request['tags'] as $tag) {
            $tag = Tag::firstOrNew(['name' => $tag]);
            $tag->slug = $tag->name;
            $tag->save();
            array_push($tags, $tag->id);
        }
        $post->tags()->sync($tags);

        return redirect()->route('posts.index')->with('success', 'Post has been updated');
    }


    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post has been deleted.');
    }
}
