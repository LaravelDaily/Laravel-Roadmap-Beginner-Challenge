<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.home', [
            'articles' => Article::with(['author', 'tags', 'categories'])->paginate(10)
        ]);
    }
}
