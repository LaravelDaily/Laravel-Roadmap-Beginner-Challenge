<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRepository $articleRepository)
    {
        $data = [
            'articles' => $articleRepository->articles(),
        ];
        return view('article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRepository $categoryRepository,
    TagRepository $tagRepository)
    {
        $data = [
            'categories'    => $categoryRepository->categories(),
            'tags'          => $tagRepository->tags(),
        ];
        return view('article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try{
            $s = new \App\Services\ArticleService();
            $s->store($request->all());
            return redirect(route('articles.index'))->with('alert-success', 'Data Created Successfully');
        }catch(\Throwable $e){
            Log::error([
                get_class($this),
                'Message ' . $e->getMessage(),
                'On line ' . $e->getFile(),
                'On file ' . $e->getLine()
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $data = [
            'categories'    => $categoryRepository->categories(),
            'tags'          => $tagRepository->tags(),
            'article'       => $article
        ];
        return view('article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        try{
            $s = new \App\Services\ArticleService();
            $s->update($request->all(),$article);
            return redirect(route('articles.index'))->with('alert-success', 'Data Successfully Updated');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'update with params ' . json_encode($request->all()),
                'Message ' . $e->getMessage(),
                'On file ' . $e->getFile(),
                'On line ' . $e->getLine()
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try{
            $s = new \App\Services\ArticleService();
            $s->destroy($article);
            return redirect(route('articles.index'))->with('alert-success','Article Successfully Deleted');
        }catch(\Throwable $e){
            Log::error([
                get_class($this),
                'Message ' . $e->getMessage(),
                'On file ' . $e->getFile(),
                'On line ' . $e->getLine()
            ]);
            return back()->with('alert', $e->getMessage());
        }
    }
}
