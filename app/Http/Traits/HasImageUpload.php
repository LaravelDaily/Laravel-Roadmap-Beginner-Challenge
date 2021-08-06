<?php
namespace App\Http\Traits;

trait HasImageUpload {

    protected function uploadImage($image)
    {
        if(!$image)
        {
            return null;
        }
        $filename = time().'.'.$image->extension();
        $image->storeAs('public', $filename);
        return $filename;
    }
}
