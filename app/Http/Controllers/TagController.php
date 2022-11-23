<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\ModelCRUDService;
use Illuminate\Support\Arr;

class TagController extends Controller
{
    private $crud;

    public function __construct(ModelCRUDService $crud)
    {
        $this->crud = $crud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name')->paginate(20);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create', [
            'tag' => new Tag()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        if (!Tag::whereName($request->name)->first()) {
            $this->crud->create(new Tag(), Arr::collapse([
                $request->validated(),
                ['slug' => str($request->name)->slug]
            ]));
        }
        return redirect()->route('tags.index')->with('status', 'Tag Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        if (!Tag::whereName($request->name)->first()) {
            $this->crud->update($tag, Arr::collapse([
                $request->validated(),
                ['slug' => str($request->name)->slug]
            ]));
        }
        return redirect()->route('tags.index')->with('status', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->crud->delete($tag);
        return back()->with('status', 'Tag Deleted');
    }
}
