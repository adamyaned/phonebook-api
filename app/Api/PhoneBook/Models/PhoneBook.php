<?php

namespace App\Api\PhoneBook\Models;

use App\Api\PhoneBook\Filters\PhoneBookFilter;
use Database\Factories\PhoneBookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory, PhoneBookFilter;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PhoneBookFactory::new();
    }

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'country_code',
        'timezone'
    ];
}
