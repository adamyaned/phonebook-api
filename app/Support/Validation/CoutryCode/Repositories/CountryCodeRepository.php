<?php

namespace App\Support\Validation\CoutryCode\Repositories;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CountryCodeRepository
{
    /**
     * @return mixed
     * @throws ApiException
     */
    public function all()
    {
        try{
            return Cache::remember('countryCodes', DAY_IN_SECONDS, function () {
                $result = Http::get('http://country.io/continent.json')->throw()->json();

                if($result){
                    return array_keys($result);
                }
            });
        }catch (\Exception $exception){
            throw new ApiException();
        }
    }
}
