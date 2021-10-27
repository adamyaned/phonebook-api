<?php

namespace Database\Seeders;

use App\Api\PhoneBook\Models\PhoneBook;
use Illuminate\Database\Seeder;

class PhoneBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneBook::factory()->count(100)->create();
    }
}
