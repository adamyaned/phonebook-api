<?php

namespace App\Api\PhoneBook\Resources;

use App\Http\Resource\PaginatedJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneBookResource extends PaginatedJsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'firstname' => (string)$this->firstname,
            'lastname' => (string)$this->lastname,
            'countryCode' => (string)$this->country_code,
            'timezone' => (string)$this->timezone,
            'phoneNumber' => (string)$this->phone_number,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
