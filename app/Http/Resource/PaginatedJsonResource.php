<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginatedJsonResource extends JsonResource
{
    /**
     * @param mixed $resource
     * @return array
     */
    public static function collection($resource)
    {
        return [
            'data' => parent::collection($resource),
            'pagination' => [
                'total' => $resource->total(),
                'currentPage' => $resource->currentPage(),
                'perPage' => $resource->perPage(),
                'lastPage' => $resource->lastPage(),
            ]
        ];
    }
}
