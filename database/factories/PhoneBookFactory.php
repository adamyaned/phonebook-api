<?php

namespace Database\Factories;

use App\Api\PhoneBook\Models\PhoneBook;
use App\Support\Validation\CoutryCode\Repositories\CountryCodeRepository;
use App\Support\Validation\Timezone\Repositories\TimezoneRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PhoneBookFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = PhoneBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countryCodeRepository = new CountryCodeRepository();
        $timezoneRepository = new TimezoneRepository();
        $countryCodes = $countryCodeRepository->all();
        $timezones = $timezoneRepository->all();

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'country_code' => Arr::random($countryCodes),
            'timezone' => Arr::random($timezones)
        ];
    }
}
