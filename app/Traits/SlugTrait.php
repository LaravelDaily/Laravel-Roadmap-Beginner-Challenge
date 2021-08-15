<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    static public function createSlug($text, $id)
    {
        $slug = Str::slug($text);
        $i = 1;

        while (static::whereSlug($slug)->where('id', '<>', $id)->exists()) {
            $slug = Str::slug($text) . '-' . $i++;
        }

        return $slug;
    }
}
