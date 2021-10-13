<?php

namespace App\Http\Controllers\Dashboard;

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

        return view('dashboard.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('dashboard.tags.create');
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

        return redirect()->route('dashboard.tags.edit', $tag)->with('success', 'Tag Created!');
    }

    public function edit(Tag $tag): View
    {
        return view('dashboard.tags.edit', compact('tag'));
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

        return redirect()->back()->with('success', 'Tag Updated!');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->back()->with('success', "Tag {$tag->name} was deleted!");
    }
}
