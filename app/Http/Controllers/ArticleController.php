<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\StoreImageService;

use Illuminate\Http\Request;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.articles', [
            'articles' => $articles
        ]);
    }

    public function article_manager()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.article.articles-manage', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $tags = Tag::orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.article.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleData = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'image|file|nullable',
            'category_id' => 'required',
            'tags' => 'array|required',
        ]);

        $article = new Article();

        // Check if the tags are on DB
        $tags = [];
        for ($i = 0; $i < sizeof($request['tags']); $i++) {
            $tag = Tag::find($request['tags'][$i]);
            if (empty($tag->id)) {
                return back()->withErrors(['tags' => 'The given tags are not valid.']);
            } else {
                array_push($tags, $tag);
            }
        }



        $category = Category::find($articleData['category_id']);

        if (empty($category->id)) {
            return back()->withErrors([
                "category_id" => 'The given category is invalid.'
            ]);
        }


        $imagePath = 'placeholder-image.jpg';

        if ($request->file('image')) {
            $imagePath =  StoreImageService::store($request->file('image'), 'public');
        }

        $article->category_id = $category->id;
        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->image = $imagePath;
        $article->save();

        foreach ($tags as $tag) {
            $article->tags()->attach($tag);
        }
        $article->save();

        return redirect(route('article_manager'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            throw new NotFoundHttpException();
        }

        return view('pages.article', [
            'article' => $article,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.article.articles-edit', [
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $id)
    {
        $articleData = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'image|file|nullable',
            'category_id' => 'required',
            'tags' => 'array|required',
        ]);

        $article = Article::find($id);
        if (!$article) {
            throw new NotFoundHttpException();
        }
        // Check if the tags are on DB
        $tags = [];
        for ($i = 0; $i < sizeof($request['tags']); $i++) {
            $tag = Tag::find($request['tags'][$i]);
            if (empty($tag->id)) {
                return back()->withErrors(['tags' => 'The given tags are not valid.']);
            } else {
                array_push($tags, $tag->id);
            }
        }


        $category = Category::find($articleData['category_id']);

        if (empty($category->id)) {
            return back()->withErrors([
                "category_id" => 'The given category is invalid.'
            ]);
        }

        $imagePath = $article->image;

        if ($request->file('image')) {
            $imagePath =  StoreImageService::store($request->file('image'), 'public');
        }

        $article->category_id = $category->id;
        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->image = $request->image;
        $article->save();

        $article->tags()->sync($tags);
        $article->save();

        return redirect(route('article_manager'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            throw new NotFoundHttpException();
        }

        $article->delete();
        return redirect(route('article_manager'));
    }
}
