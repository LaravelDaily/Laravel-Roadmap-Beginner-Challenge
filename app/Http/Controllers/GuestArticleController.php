<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class GuestArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $articles = [];

        if(request()->has('categoryId')){
            request()->validate([
                'categoryId' => 'integer|exists:App\Models\Category,id',
            ]);
            $categoryId = request()->categoryId;
            $articles = Category::find($categoryId)->articles()->paginate(3);
            $articles->load(['media', 'tags']);
            request()->session()->put('categoryId', $categoryId);
        }else {
            $articles = Article::with(['media', 'tags'])->paginate(3);
            request()->session()->forget('categoryId');
        }
          
        return view('landing-page', compact('articles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        $article->load('media');
        return view('article', compact('article'));
    }
}
