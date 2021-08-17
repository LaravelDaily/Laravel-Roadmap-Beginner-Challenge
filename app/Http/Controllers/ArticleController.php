<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\Article\CreateArticleRequest;
use App\Http\Requests\Panel\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::UserPost()
            ->with('user')
            ->with('category')
            ->paginate(10);

        return view('panel.article.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('panel.article.create', compact(['categories', 'tags']));
    }


    public function store(CreateArticleRequest $request)
    {
        $tagsId = Tag::whereIn('id', $request->tags) //get tags id
            ->get()
            ->pluck('id')
            ->toArray();

        $img = $request->file('img');
        $imgName =  time() . '_' . $img->getClientOriginalName(); // change img name to unique name.
        $img->storeAs('images/articles', $imgName, 'public'); // store file

        $data = $request->validated();

        $data['img'] = $imgName;
        $data['user_id'] = auth()->user()->id;

        $article = Article::create(
            $data
        );
        $article->tags()->sync($tagsId);
        session()->flash('status', 'Article Created Successfully!');
        return back();
    }


    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('panel.article.edit', compact(
            ['article', 'tags', 'categories']
            )
        );
    }


    public function update(UpdateArticleRequest $request, Article $article)
    {
        $tagsId = Tag::whereIn('id', $request->tags) //get tags id
            ->get()
            ->pluck('id')
            ->toArray();

        $data = $request->validated();

        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $imgName =  time() . '_' . $img->getClientOriginalName(); // change img name to unique name.
            $img->storeAs('images/articles', $imgName, 'public'); // store file
            $data['img'] = $imgName;
        }

        $data['user_id'] = auth()->user()->id;

        $article->update(
            $data
        );
        $article->tags()->sync($tagsId);
        session()->flash('status', 'Article Updated Successfully!');
        return back();
    }


    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('status', 'Article Deleted Successfully!');
        return back();
    }
}
