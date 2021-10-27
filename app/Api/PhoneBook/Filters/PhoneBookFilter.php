<?php

namespace App\Api\PhoneBook\Filters;

use Illuminate\Database\Eloquent\Builder;

trait PhoneBookFilter
{
    /**
     * @param Builder $query
     * @param $name
     * @return Builder
     */
    public function scopeName(Builder $query, $name)
    {
        return $query
            ->where('first_name', 'LIKE', "%{$name}%")
            ->orWhere('last_name', 'LIKE', "%{$name}%");
    }
}
