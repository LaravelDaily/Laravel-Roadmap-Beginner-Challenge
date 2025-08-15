<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::OrderBy('id','DESC')->get();
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $tag =Tag::get();
        return view('post.create',compact('category','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
        ]);


        $store_image = null;
        if (request()->hasFile('image')) 
        {
            $file = request()->File('image');
            $store_image = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./images/', $store_image);
        } 

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'tag_id' => implode("," , $request->tag_id),
            'image'       =>   $store_image,
        );

        Post::create($data);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::get();
        return view('post.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $currentImage = $user->image;

        $image_set = null;
        if (request()->File('image')) 
        {
            $file = request()->File('image');
            $image_set = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./images/', $image_set);
        }

        $post->update($request->all());
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('post');
    }
}
