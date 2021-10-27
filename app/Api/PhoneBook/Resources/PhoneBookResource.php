<?php

namespace App\Api\PhoneBook\Resources;

use App\Http\Resource\PaginatedJsonResource;
use Illuminate\Support\Carbon;

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
            'firstname' => (string)$this->first_name,
            'lastname' => (string)$this->last_name,
            'countryCode' => (string)$this->country_code,
            'timezone' => (string)$this->timezone,
            'phoneNumber' => (string)$this->phone_number,
            'createdAt' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s')
        ];
    }
}
