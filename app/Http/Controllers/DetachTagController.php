<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Article;

class DetachTagController extends Controller
{
    public function __invoke(Article $article,Tag $tag)
    {
        $article->tags()->detach($tag);
        return back();
    }
}
