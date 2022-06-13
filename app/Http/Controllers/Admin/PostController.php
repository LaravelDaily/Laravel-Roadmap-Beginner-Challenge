<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $id = Auth::user()->id;

        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
        }

        $post = Post::create([
            'title'         => request('title'),
            'description'   => request('description'),
            'category_id'   => request('category_id'),
            'image'         => $filename ?? null,
            'user_id'       => $id,
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }


        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $tags = $post->tags->implode('name', ', ');

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {
        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
        }


        $post->update([
            'title'         => request('title'),
            'description'   => request('description'),
            'image'         => $filename ?? $post->image,
            'category_id'   => request('category_id'),
            'user_id'       => Auth()->id(),
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index');
    }
}
