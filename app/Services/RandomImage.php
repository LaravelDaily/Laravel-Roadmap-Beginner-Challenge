<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Helpers\FilesystemHelper;

class RandomImage {
    /* Returns an image uri, if the percentage is matched; returns null otherwise. */
    public static function getLegacyImageUri(int $percentage = 100): string|null {
        if (rand(1,100) <= $percentage) {
            $ar = Storage::disk(FilesystemHelper::LEGACY_DISK)->files();
            return FilesystemHelper::LEGACY_DISK . '/' . $ar[array_rand($ar)];
        } else return null;
    }
}