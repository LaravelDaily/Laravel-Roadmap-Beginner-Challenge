<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function indexGuest(Request $request): View
    {
        $articles = Article::with('tags','category')->where($request->query())->latest()->paginate(10);

        return view('article.index', [
            'articles' => $articles,
            'categories' => Category::latest()->get()
        ]);
    }

    public function index(): View
    {
    
        return view('admin.article.index', [
            'articles' => Article::latest()->paginate(10),
            'categories' => Category::latest()->paginate(10)
        ]);
    }

    public function show(Article $article): View
    {
        return view('article.show', ['article' => $article]);
    }

    public function store(StoreArticleRequest $request, Article $article)
    {
        $file = $request->file('image');
        $path =  Storage::putFileAs('images', $file, $file->hashName());
       
        $tags = explode(',', $request->get('tags'));
        $input = $request->toArray();
        $input['image'] =  basename($path);
        $article = Article::create($input);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }

        return redirect(route('article.store'))->with(['status' => 'Article Created!']);
    }

    public function edit(Article $article)
    {
        $tags = implode(',', $article->tags->pluck('name')->toArray());

        return view('admin.article.edit', [
            'article' => $article,
            'categories' => Category::all(),
            'tags' => $tags,
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $file = $request->file('image');
        $input = $request->toArray();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path =  Storage::putFileAs('images', $file, $file->hashName());
            Storage::delete($article->image);
            $input['image'] =  basename($path);
        }

        $tags = explode(',', $request->get('tags'));
    
        $article->update($input);
        $tag_ids = [];
        foreach ($tags as $tagName) {
            $tag_ids[] = Tag::firstOrCreate(['name' => ltrim($tagName, '#')])->id;
        }
        $article->tags()->sync($tag_ids);
        return redirect(route('articles.show', $article))->with(['status' => 'Article Updated!']);
    }
}
