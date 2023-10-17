<?php

namespace App\Helpers;

class StringTrimmerHelper {
    public static function rightTrimOnSpace(string $original, int $maxLength): string {
        $st = substr($original, 0, $maxLength);
        $pos = strrpos($st, ' ');
        return $pos ? substr($st, 0, $pos + 1) : $st;
    }
}