<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagValidationRequest;
use App\Models\ArticleTag;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all()
            ->sortBy('name');
        return view('admin.tags.index', [
            'tags' => $tags
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagValidationRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return \View::make('admin.tags.edit')
            ->with([
                'tag' => $tag,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagValidationRequest $request, $id)
    {
        $tag = Tag::where('id', $id)
            ->updateWithUserstamps([
                'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $article_tag_deleted = ArticleTag::where('tag_id', $tag->id)->delete();
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
