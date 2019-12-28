<?php


namespace App\Admin;


class ArrayChunkWithKey
{
    public static function create($key, $array)
    {
        return array_map(function ($route) use($key) {
            return [
                $key => $route[0]
            ];
        }, array_chunk($array, 1));
    }
}