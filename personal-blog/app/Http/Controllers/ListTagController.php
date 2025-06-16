<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class ListTagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tags = Tag::orderByDesc('id')->paginate(5);

        return view('list.tag', [
            'tags' => $tags,
        ]);
    }
}
