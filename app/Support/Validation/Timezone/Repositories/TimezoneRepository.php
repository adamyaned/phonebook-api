<?php

namespace App\Support\Validation\Timezone\Repositories;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TimezoneRepository
{
    /**
     * @return mixed
     * @throws ApiException
     */
    public function all()
    {
        try{
            return Cache::remember('timezones', DAY_IN_SECONDS, function () {
                return Http::get('http://worldtimeapi.org/api/timezone')->throw()->json();
            });
        }catch (\Exception $exception){
            throw new ApiException($exception->getMessage(), $exception->getCode());
        }
    }
}
