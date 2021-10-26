<?php

namespace App\Support\Validation\CoutryCode\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CountryCodeRepository
{
    /**
     * @return array|mixed
     */
    public function all()
    {
        try{
            return Cache::remember('countryCodes', DAY_IN_SECONDS, function () {
                Http::get('http://country.io/continent.json')->throw()->json();
            });
        }catch (RequestException $exception){
            logError($exception);
        }
    }
}
