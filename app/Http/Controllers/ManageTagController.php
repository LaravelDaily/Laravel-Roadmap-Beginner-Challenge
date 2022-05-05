<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class ManageTagController extends Controller
{
    public function index()
    {
        return view('manage.tag.index', [
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('manage.tag.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:15']
        ]);

        Tag::create($attributes);

        return redirect()
            ->back()
            ->with("success", "Tag Created!");
    }

    public function edit(Tag $tag)
    {
        return view('manage.tag.edit', [
            'tag' => $tag
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:15']
        ]);

        $tag->update($attributes);

        return back()->with('success', 'Tag Updated!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('success', 'Tag Deleted!');
    }
}
