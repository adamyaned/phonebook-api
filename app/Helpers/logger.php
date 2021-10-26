<?php

use Illuminate\Support\Facades\Log;

if(!function_exists('logError')){
    /**
     * @param Throwable $e
     */
    function logError(Throwable $e){
        Log::error(json_encode([
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]));
    }
}
