<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use File;
use DOMDocument;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);   
        return view('pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //delete unused images
        $images = Image::leftjoin('article_image', function($join) {
            $join->on('images.id', '=', 'article_image.imageId');
        })->whereNull('article_image.imageId')->get();

        foreach ($images as $img) {
            @unlink(public_path('uploads/'.$img->name));
            $img->delete();
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.article.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store new article
        $validated = $request->validate([
            'title' => 'required|min:5',
            'text' => 'required',
            'categoryId' => 'exists:categories,id|integer',
        ]);      

        $article = $request->user()->articles()->create($validated);

        //attach tags to article
        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        //attach images to article
        $dom = new DOMDocument;
        $dom->loadHTML($article->text, LIBXML_NOERROR);
        $imgPaths = $dom->getElementsByTagName('img');

        foreach ($imgPaths as $imgPath) {
            $filename = pathinfo($imgPath->getAttribute('src'))['basename'];
            $image = Image::where('name', $filename)->first();
            $article->images()->attach($image);
        }

        return redirect(route('admin.article.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $art = Article::find($article->id);
        return view('pages.article.show', compact('art'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $art = Article::find($article->id);
        
        return view('pages.article.edit', compact(['categories', 'tags', 'art']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //update article
        $validated = $request->validate([
            'title' => 'required|min:5',
            'text' => 'required',
            'categoryId' => 'exists:categories,id|integer',
        ]);

        $article->update($validated);
        
        //update attached tags to article
        $article->tags()->detach($article->tags);

        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        //update attached images to article
        $article->images()->detach($article->images);

        $dom = new DOMDocument;
        $dom->loadHTML($article->text, LIBXML_NOERROR);
        $imgPaths = $dom->getElementsByTagName('img');

        foreach ($imgPaths as $imgPath) {
            $filename = pathinfo($imgPath->getAttribute('src'))['basename'];
            $image = Image::where('name', $filename)->first();
            $article->images()->attach($image);
        }

        //delete unused images from article
        $images = Image::leftjoin('article_image', function($join) {
            $join->on('images.id', '=', 'article_image.imageId');
        })->whereNull('article_image.imageId')->get();
        
        foreach ($images as $img) {
            @unlink(public_path('uploads/'.$img->name));
            $img->delete();
        }

        return redirect(route('admin.article.show', ['article' => $article]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach($article->tags);
        
        //delete images from article
        $article->images()->detach($article->images);
        
        foreach ($article->images as $img) {
            @unlink(public_path('uploads/'.$img->name));
            $img->delete();
        }

        $article->delete();
        return redirect(route('admin.article.index'));
    }

}
