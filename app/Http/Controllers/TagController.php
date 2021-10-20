<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TagController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::latest()->get()->map(function (Tag $tag) {
            return [
                'key' => $tag->id,
                'title' => $tag->title,
            ];
        });

        return Inertia::render('Backend/Tags/TagList', compact('tags'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tag.create');
    }

    /**
     * @param \App\Http\Requests\TagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->validated());

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Tag created successfully.',
        ]);

        return redirect()->route('tags.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tag $tag)
    {
        return view('tag.show', compact('tag'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    /**
     * @param \App\Http\Requests\TagUpdateRequest $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Tag updated successfully.',
        ]);

        return redirect()->route('tags.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => 'Tag deleted successfully.',
        ]);

        return redirect()->route('tags.index');
    }
}
