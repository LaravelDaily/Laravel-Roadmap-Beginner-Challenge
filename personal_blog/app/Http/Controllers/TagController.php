<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    private $adminRoute;

    public function __construct()
    {
        $this->adminRoute = Tag::$adminRoute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(15);
        return view("$this->adminRoute.index", compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("$this->adminRoute.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $tag = $request->validated();
        try {
            Tag::create($tag);
            $message_type = 'success';
            $message = __('added successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view("$this->adminRoute.edit", compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTagRequest $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->validated());
            $message_type = 'success';
            $message = __('updated successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            Tag::destroy($tag->id);
            $message_type = 'success';
            $message = __('deleted successfully');
        } catch (\Exception $exception) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            return view('errors.custom-error', compact('message', 'code'));
        }
        return to_route("$this->adminRoute.index")->with($message_type, $message);
    }
}
