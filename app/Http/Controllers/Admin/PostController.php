<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->has('image')) {
            $filename = time(). '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts_img', $filename, 'public');
        }

        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'post' => $request->post,
            'category_id' => $request->category,
            'image' => $filename ?? null
        ]);

        $tags = explode(',', $request->tags);
        foreach ($tags as $tag) {
            $tag = Str::of($tag)->trim();
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        $tags = $post->tags->implode('name', ',');

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->has('image')) {
            Storage::delete('posts_img' . $post->image);
            $filename = time(). '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts_img', $filename, 'public');
        }

        $post->update([
            'title' => $request->title,
            'post' => $request->post,
            'category_id' => $request->category,
            'image' => $filename ?? $post->image
        ]);

        $tags = explode(',', $request->tags);

        $newTags = [];
        foreach ($tags as $tag) {
            $tag = Str::of($tag)->trim();
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image)
        {
            Storage::delete('post_img' . $post->image);
        }
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
