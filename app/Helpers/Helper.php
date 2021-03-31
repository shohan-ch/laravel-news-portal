<?php

namespace App\Helpers;

use App\Models\Article;

class Helper
{

    public static function singeleImage($images)
    {
        $explode = explode(" ", $images);
        foreach ($explode as $image) {
            return $image;
            break;
        }
    }
}