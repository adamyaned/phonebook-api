<?php

namespace App\Api\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'name' => 'required|max:100'
        ];
    }
}
