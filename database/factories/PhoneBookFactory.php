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
     * @var TimezoneRepository
     */
    protected $timezoneRepository;

    /**
     * @var CountryCodeRepository
     */
    protected $countryCodeRepository;

    /**
     * PhoneBookFactory constructor.
     * @param null $count
     * @param Collection|null $states
     * @param Collection|null $has
     * @param Collection|null $for
     * @param Collection|null $afterMaking
     * @param Collection|null $afterCreating
     * @param null $connection
     */
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->countryCodeRepository = new CountryCodeRepository();
        $this->timezoneRepository = new TimezoneRepository();
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countryCodes = $this->countryCodeRepository->all();
        $timezones = $this->timezoneRepository->all();

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'country_code' => Arr::random($countryCodes),
            'timezone' => Arr::random($timezones)
        ];
    }
}
