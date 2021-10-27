<?php

use Illuminate\Support\Str;

if (!function_exists('snakeCase')) {
    /**
     * @param $array
     * @return array
     */
    function snakeCase($array)
    {

        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = snake_keys($value);
            }
            $result[Str::snake($key)] = $value;
        }
        return $result;
    }
}
