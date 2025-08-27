<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'], ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Post $posts)
    {
        $posts =  $posts->with(['category', 'tags'])->paginate(4);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::get();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fullText' => 'required',
            'image' => 'mimes:jpg,png,svg,jpeg',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file_path = 'public/image';
            $file = $request->file('image');
            $fileName = time() . '.' . $file->extension();
            $file->storeAs($file_path . '/' . $fileName);
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'fullText' => $request->input('fullText'),
            'image' => $fileName,
            'category_id' => $request->input('category_id')
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect(route('posts.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $post->with('category');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg,jfif,svg'
        ]);

        if ($request->hasFile('image')) {
            $file_path = 'public/image/';
            $file = $request->file('image');
            $fileName = time() . '.' . $file->extension();
            $file->storeAs($file_path, '/' . $fileName);
        } else {
            $fileName = null;
        }


        if ($fileName) {
            $post->update([
                'title' => $request->input('title'),
                'fullText' => $request->input('fullText'),
                'image' => $fileName,
                'category_id' => $request->input('category_id')
            ]);

            $post->tags()->sync($request->tags);
        } else {
            $post->update([
                'title' => $request->input('title'),
                'fullText' => $request->input('fullText'),
                'category_id' => $request->input('category_id')
            ]);

            $post->tags()->sync($request->tags);
        }



        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findorFail($id)->delete();
        return redirect('/posts');
    }
}
