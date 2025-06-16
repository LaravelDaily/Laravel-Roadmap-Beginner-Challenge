<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['category'])->orderByDesc('id')->paginate(5);

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $article = Article::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $imagePath,
            'user_id' => $request->user()->id,
            'category_id' => $validated['category'],
        ]);

        if (!empty($validated['tags'])) {
            foreach ($validated['tags'] as $tag) {
                $article->tags()->attach($tag);
            }
        }

        return redirect(route('list.article'))->with('success', 'Article added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        $formatedTime = Carbon::create($article->created_at)->format('M d, Y');

        return view('article.show', [
            'article' => $article,
            'formatedTime' => $formatedTime,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.edit', [
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        $article = Article::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $article->image;
        }

        $article->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $imagePath,
            'category_id' => $validated['category'],
        ]);

        if (!empty($validated['tags'])) {
            $article->tags()->sync($validated['tags']);
        } else {
            $article->tags()->detach();
        }

        return redirect(route('list.article'))->with('success', 'Article Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::findOrFail($id)->delete();

        return redirect(route('list.article'));
    }
}
