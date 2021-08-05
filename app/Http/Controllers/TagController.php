<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        return view('tags', [
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect(route('tags.index'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(route('tags.index'));
    }
}
