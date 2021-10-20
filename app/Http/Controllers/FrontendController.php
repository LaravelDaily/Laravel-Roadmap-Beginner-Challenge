<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        Inertia::setRootView('bs5');

        $categories = Category::withCount('articles')->orderBy('articles_count', 'DESC')->get()->where('articles_count', '>', 0)->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
            ];
        });

        $articles = Article::latest()->get()->map(function (Article $article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'body' => $article->body,
                'image' => $article->image ?: null,
                'tags' => $article->tags->pluck('title'),
                'category' => $article->category ? $article->category->title : null,
                'created_at' => $article->created_at->diffForHumans(),
            ];
        });

        $months = Article::latest()->get()->groupBy(function (Article $article) {
            return $article->created_at->format('F Y');
        })->map(function ($articles, $month) {
            return [
                'month' => $month,
                'articles' => count($articles)
            ];
        });

        return Inertia::render('Frontend/FrontendBlog', compact('categories', 'articles', 'months'));
    }

    public function about()
    {
        Inertia::setRootView('bs5');

        return Inertia::render('Frontend/About');
    }

    public function showArticle(Article $article)
    {
        Inertia::setRootView('bs5');

        $article = [
            'id' => $article->id,
            'title' => $article->title,
            'body' => $article->body,
            'image' => $article->image ?: null,
            'tags' => $article->tags->pluck('title'),
            'category' => $article->category ? $article->category->title : null,
            'created_at' => $article->created_at->diffForHumans(),
        ];

        $categories = Category::withCount('articles')->orderBy('articles_count', 'DESC')->get()->where('articles_count', '>', 0)->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
            ];
        });

        return Inertia::render('Frontend/ShowArticle', compact('article', 'categories'));
    }
}
