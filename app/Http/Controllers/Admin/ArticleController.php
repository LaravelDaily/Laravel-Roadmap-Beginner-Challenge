<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('tags')->get();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body
        ]);

        if ($request->hasFile('image_path')) {
            $article->update([
                'image_path' => $this->storeImage($request)
            ]);
        }

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body
        ]);

        if ($request->hasFile('image_path')) {
            $this->updateArticleImage($request, $article);
        }

        return redirect()->route('article.show', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index');
    }

    /**
     * It stores the image to the public storage.
     *
     * @param Request $request
     * @return string The filename that was stored.
     */
    private function storeImage(Request $request)
    {   
        $path = explode("/", $request->file('image_path')->store('public/images'));
        $imageName = end($path);

        return $imageName;
    }

    /**
     * Update article image and remove old image from storage.
     *
     * @param Request $request
     * @param Article $article
     * @return void
     */
    private function updateArticleImage(Request $request, Article $article)
    {
        if (Storage::disk('public')->exists('images/'.$article->image_path)) {
            Storage::disk('public')->delete('images/'.$article->image_path);
        }

        $article->update([
            'image_path' => $this->storeImage($request)
        ]);
    }
}
