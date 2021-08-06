<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Traits\HasImageUpload;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use HasImageUpload;

    public function index()
    {
        return view('pages.post.index', [
            'posts' => Post::with('category')->latest()->paginate(10)
        ]);
    }

    public function show(Post $post)
    {
        return view('pages.post.show', ['post' => $post]);
    }

    public function create()
    {
        return view('pages.post.create', [
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $this->uploadImage($request->file('image'));
        $post = Post::create($validated);

        if($request->tag_ids)
        {
            $post->tags()->attach($request->tag_ids);
        }
        return redirect()->route('post.index')->with(['success' => 'Create success']);
    }

    public function edit(Post $post)
    {
        return view('pages.post.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        if($request->tag_ids)
        {
            $post->tags()->detach();
            $post->tags()->attach($request->tag_ids);
        }
        return redirect()->route('post.index')->with(['success' => 'Edit success']);
    }

    public function destroy(Post $post)
    {
        if($post->image)
        {
            Storage::delete('public/'.$post->image);
        }
        $post->delete();
        return redirect()->route('post.index')->with(['success' => 'Delete success']);
    }
}
