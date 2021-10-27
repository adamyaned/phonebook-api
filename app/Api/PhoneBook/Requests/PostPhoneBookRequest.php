<?php

namespace App\Api\PhoneBook\Requests;

use App\Rules\CountryCode;
use App\Rules\PhoneNumber;
use App\Rules\Timezone;
use Illuminate\Foundation\Http\FormRequest;

class PostPhoneBookRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lastName' => 'min:1|max:100',
            'firstName' => 'required|min:1|max:100',
            'countryCode' => [new CountryCode()],
            'timezone' => [new Timezone()],
            'phoneNumber' => ['required', new PhoneNumber()]
        ];
    }
}
