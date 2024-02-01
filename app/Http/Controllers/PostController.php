<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{


    public function __construct(){
        return $this->middleware('admin')->except('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts  = Post::query()->orderBy('created_at','desc')->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $post = new Post();
            $categories = Category::all();
            return view('posts.create',compact('post','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $formfields = $request->validated();


        if($request->hasFile('image')){
            $formfields['image'] = $request->file('image')->store('post','public');
        }

        Post::create($formfields);
        return to_route('posts.index')->with('success','le post a bien ete creer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $formfields = $request->validated();


        if($request->hasFile('image')){
            $formfields['image'] = $request->file('image')->store('post','public');
        }

        $post->update($formfields);
        return to_route('posts.index')->with('success','le post a bien ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('success','le post a bien ete suprimer');
    }
}
