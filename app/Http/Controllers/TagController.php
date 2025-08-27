<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index')
            ->with('tags', Tag::orderBy('id', 'desc')->paginate(15));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagStoreRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit')
            ->with('tag', $tag);
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach();
        }

        if (!$tag->articles()->count()) {
            $tag->delete();
        }

        return redirect()->route('tags.index');
    }
}
