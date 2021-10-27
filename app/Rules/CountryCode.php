<?php

namespace App\Rules;

use App\Support\Validation\CoutryCode\Repositories\CountryCodeRepository;
use Illuminate\Contracts\Validation\Rule;

class CountryCode implements Rule
{
    /**
     * @var CountryCodeRepository
     */
    private $countryCodeRepository;

    /**
     * CountryCode constructor.
     * @param CountryCodeRepository $countryCodeRepository
     */
    public function __construct(CountryCodeRepository $countryCodeRepository)
    {
        $this->countryCodeRepository = $countryCodeRepository;
    }

    /**
     * @return array|mixed
     */
    private function getCountryCodes()
    {
        return $this->countryCodeRepository->all();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $countryCodes = $this->getCountryCodes();

        return in_array($value, $countryCodes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be valid country code.';
    }
}
