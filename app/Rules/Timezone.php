<?php

namespace App\Rules;

use App\Support\Validation\Timezone\Repositories\TimezoneRepository;
use Illuminate\Contracts\Validation\Rule;

class Timezone implements Rule
{
    /**
     * @return array|mixed
     */
    private function getTimezones()
    {
        $timezoneRepository = new TimezoneRepository();

        return $timezoneRepository->all();
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
        $timezones = $this->getTimezones();

        return in_array($value, $timezones);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be valid timezone.';
    }
}
