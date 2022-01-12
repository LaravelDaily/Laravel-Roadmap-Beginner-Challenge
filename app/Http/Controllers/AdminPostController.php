<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostResquest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class AdminPostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }


    public function store(StorePostResquest $request)
    {
        Post::create($request->validated() + ['user_id' => \Auth::id()]);

        return redirect()->route('dashboard')->with('success', 'Post has been created');
    }


    public function edit(Post $post)
    {
        return view('posts.edit');
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->only('slug', 'title', 'body'));

        return back()->with('success', 'Post has been updated');
    }


    public function destroy(Post $post)
    {
        //
    }
}
