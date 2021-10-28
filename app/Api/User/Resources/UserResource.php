<?php

namespace App\Api\User\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'email' => (string)$this->email,
            'name' => (string) $this->name,
            'createdAt' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
