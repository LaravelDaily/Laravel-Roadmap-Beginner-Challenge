<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        return view('auth.tags.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50', 'unique:tags'],
        ]);

        Tag::create($attributes);

        return redirect()->route('auth.tags.create')->with('tag.created', '¡Tag creado!');
    }

    public function edit(Tag $tag)
    {
        return view('auth.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50', 'unique:tags'],
        ]);

        $tag->update($attributes);

        return redirect()->back()->with('tag.updated', '¡Tag actualizado!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back();
    }
}
