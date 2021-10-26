<?php

namespace App\Support\Validation\Timezone\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class TimezoneRepository
{
    /**
     * @return array|mixed
     */
    public function all()
    {
        try{
            return Http::get('http://worldtimeapi.org/api/timezone')->throw()->json();
        }catch (RequestException $exception){
            logError($exception);
        }
    }
}
