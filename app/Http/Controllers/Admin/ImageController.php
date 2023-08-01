<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();

        $validator = Validator::make($request->all(), [
            'upload' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

         if ($validator->fails()) {

              $data['uploaded'] = 0;
              $data['error']['message'] = $validator->errors()->first('upload');// Error response

         }else{
              if($request->file('upload')) {

                    $file = $request->file('upload');
                    $filename = time().'_'.auth()->user()->id.'_'.$file->getClientOriginalName();

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location,$filename);

                    // File path
                    $filepath = url('uploads/'.$filename);

                    // Response
                    $data['fileName'] = $filename;
                    $data['uploaded'] = 1;
                    $data['url'] = $filepath;
                    
                    auth()->user()->images()->create([
                        'name' => $filename
                    ]);

              }else{
                    // Response
                    $data['uploaded'] = 0;
                    $data['error']['message'] = 'File not uploaded.'; 
              }
         }

         return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        
    }
}
