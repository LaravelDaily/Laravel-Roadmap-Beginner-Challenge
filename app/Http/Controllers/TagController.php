<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnValue;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagRepository $tagRepository)
    {
        return view('tag.index')->with('tags',$tagRepository->tags());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TagService $tagService)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags,name'
        ]);
        try{
            $tagService->store($validated);
            return redirect(route('tags.index'))->with('alert-success', 'Tag Successfully Created');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'store with params ' . json_encode($request->all()),
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag, TagService $tagService)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags,name'
        ]);

        try{
            $tagService->update($validated, $tag);
            return redirect(route('tags.index'))->with('Tags Successfully Updated');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'update with params ' . json_encode($request->all()),
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag,TagService $tagService)
    {
        try{
            $tagService->delete($tag);
            return redirect(route('tags.index'))->with('alert-success', 'Tags Successfully Deleted');
        }catch(\Throwable $e){
            Log::error([
                get_class($this) . 'delete',
                'Message ' . $e->getMessage(),
                'On line ' . $e->getLine(),
            ]);
            return back()->with('alert', $e->getMessage())->withInput();
        }
    }
}
