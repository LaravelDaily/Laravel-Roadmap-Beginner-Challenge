<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::latest()->paginate(10);

        return view('auth.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('auth.tags.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50', 'unique:tags'],
        ]);

        $tag = Tag::create($attributes);

        return redirect()->route('auth.tags.edit', $tag)->with('tag.created', 'Tag Created!');
    }

    public function edit(Tag $tag): View
    {
        return view('auth.tags.edit', compact('tag'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50', 'unique:tags'],
        ]);

        $tag->update($attributes);

        return redirect()->back()->with('tag.updated', 'Tag Updated!');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->back()->with('tag.destroyed', "Tag {$tag->name} was deleted!");
    }
}
