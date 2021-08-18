<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\Tag\CreateTagRequest;
use App\Http\Requests\Panel\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(10);
        return view('panel.tag.index', compact('tags'));
    }


    public function create()
    {
        return view('panel.tag.create');
    }


    public function store(CreateTagRequest $request)
    {
        $data = $request->validated();
        Tag::create(
            $data
        );
        session()->flash('status', 'Tag Created Successfully!');
        return redirect(route('tags.index'));
    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit(Tag $tag)
    {
        return view('panel.tag.edit', compact('tag'));
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update(
            $data
        );
        session()->flash('status', 'Tag Updated Successfully!');
        return redirect(route('tags.index'));
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('status', 'Tag Deleted Successfully!');
        return back();
    }
}
