<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::pluck('name', 'id');
        $articles = Article::orderByDesc('created_at')->with('category', 'author')->simplePaginate(4);
        return view('front.index', compact(['categories', 'articles']));
    }

    public function showCategory(string $id): View
    {
        $articles = Article::orderByDesc('created_at')
            ->where(function (Builder $query) use ($id) {
                return $query->where('category_id', $id)->firstOrFail();
            })->with('category', 'author')->simplePaginate(4);
        $categories = Category::pluck('name', 'id');
        return view('front.blog.index', compact(['categories', 'articles']));
    }

    public function showBlogDetail(string $category_id, string $slug)
    {
        $article = Article::where([
            'category_id' => $category_id,
            'slug' => $slug,
            ])->with('author', 'category:id,name', 'tags')->firstOrFail();
        $relatedArticle = Category::find($category_id)->articles()->get();
//        dd($relatedArticle);
        return view('front.blog.detail', compact('article', 'relatedArticle'));
    }
}
