<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ImageUploadTrait
{
    public function uploadImage($image, $folder = null, $disk = 'public', $filename = null)
    {
        if ($filename) {
            $name = $filename;
        } else {
            $name = Str::random(10) . time() . Str::random(10) . "." . Str::lower($image->getClientOriginalExtension());
        }

        $image->storeAs("uploads/images/" . $folder, $name, $disk);

        return $name;
    }
}
