<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreArticle;
use App\Http\Requests\Article\UpdateArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticlesController extends Controller
{
    public $uploadPath = 'app/public/article';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category','tags')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            $img = Image::make($image)->resize(286, 180);
            $img->save(storage_path($this->uploadPath. '/' . $imageName));

        } else {
            $imageName = 'noimage.jpg';
        }
        $article = Article::create([
            'title' => $request->title,
            'image' => $imageName,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);
        $article->tags()->attach($request->tag);

        return redirect()->route('articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticle $request, $id)
    {
        $article = Article::findOrFail($id);
        $old_image = $article->image;
        if($request->hasFile('image')) {
            if($old_image != 'noimage.jpg' && Storage::exists('public/article/' . $old_image)) {
                Storage::delete('public/article/' . $old_image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image)->resize(286, 180);
            $img->save(storage_path($this->uploadPath. '/' .$imageName));
        }
        else
        {
            $imageName = $old_image;
        }
        $article->update([
            'title' => $request->title,
            'image' => $imageName,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);
        $article->tags()->sync($request->tag);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $old_image = $article->image;
        if($old_image != 'noimage.jpg' && Storage::exists('public/article/' . $old_image)) {
            Storage::delete('public/article/' . $old_image);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('message', 'Article deleted successfully');
    }
}
