<?php

namespace App\Api\PhoneBook\Repositories;

use App\Api\PhoneBook\Models\PhoneBook;
use App\Exceptions\NotFoundException;

class PhoneBookRepository
{
    /**
     * @param $id
     * @throws NotFoundException
     */
    public function delete(int $id)
    {
        $phoneBook = PhoneBook::where('id', $id)->first();

        if(!$phoneBook){
            throw new NotFoundException();
        }

        $phoneBook->delete();
    }
}
