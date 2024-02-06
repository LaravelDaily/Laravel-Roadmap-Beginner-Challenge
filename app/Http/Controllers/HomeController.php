<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::latest()->get();

    return view('posts.home', compact('posts'));
    }

    public function info(){
        return view('admin.info');
    }
}

