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
        $posts = Post::with('tags', 'category')->simplePaginate(5);

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
        $post = Post::create($request->except('tags') + ['user_id' => \Auth::id()]);

        $tags = [];
        foreach ($request['tags'] as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => $tag]);
            array_push($tags, $tag->id);
        }
        $post->tags()->sync($tags);

        return redirect()->route('posts.index')->with('success', 'Post has been created');
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact(['post']));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->except('tags'));

        $post->tags()->detach();

        foreach ($request['tags'] as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => $tag]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('posts.index')->with('success', 'Post has been updated');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post has been deleted.');
    }
}
