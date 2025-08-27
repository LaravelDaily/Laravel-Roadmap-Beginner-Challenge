<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('article.all', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::select('id', 'name')->get();
        return view('article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // dd('hi');
        $article = new Article();
       
        $article->title = $request->title;
        $article->details = $request->details;
        $article->category_id = $request->category;

        if ($request->hasFile('image')) {
            $fileName = $request->image->hashName(); // Generate a unique, random name...
            $article->image = $fileName;
            // Store the uploaded file
            $request->image->storeAs('images', $fileName, 'public');
        }
        $article->save();
        $article->tags()->sync((array)$request->input('tags'));
        
        return redirect()->route('article.index')->with('success', 'Article saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('tags')->findOrFail($id);
        return view('article.details', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::select('id', 'name')->get();
        $categories = Category::all();
        return view('article.edit', compact('categories', 'article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $article->title = $request->title;
        $article->details = $request->details;
        $article->category_id = $request->category;

        if ($request->hasFile('image')){
            
            if (Storage::disk('public')->exists('images/'. $article->image)) 
            {
                dd('duplicate image');
                Storage::disk('public')->delete('images/'. $article->image);
            }

            $fileName = $request->image->hashName(); // Generate a unique, random name...
            $article->image = $fileName;
            // Store the uploaded file
            $request->image->storeAs('images', $fileName, 'public');
        }

        $article->save();
        $article->tags()->sync((array)$request->input('tags'));

        return redirect()->route('article.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if(Storage::disk('public')->exists('images/'. $article->image))
        {   
            Storage::disk('public')->delete('images/'. $article->image);
        }

        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }
}
