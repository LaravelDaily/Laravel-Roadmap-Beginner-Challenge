<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimestampHelper {
    public static function getFileTimestamp(): string {
        return Carbon::now()->format('Y-m-d-H-i-s-u');
    }
}