<?php

namespace App\Services;

use Faker\Provider\Uuid;

class StoreImageService
{

    /**
     * Store an image in store folder, and return full image path
     *
     * @param [type] $image
     * @return string
     */
    public static function store($imageRequestFile, string $folder): string
    {
        $imgFileType =  $imageRequestFile->extension();
        $imagePath =  $imageRequestFile
            ->storeAs('public',  Uuid::uuid() . date('d-m-Y-G-i-s') . ".{$imgFileType}");
        return $imagePath;
    }
}
