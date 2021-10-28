<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

if(!function_exists('logError')){
    /**
     * @param Throwable $e
     */
    function logError(Throwable $e){
        Log::error("[" . Carbon::now()->format('Y-m-d H:i:s') ."]=>" . json_encode([
            'code' => $e->getCode() ?? 500,
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]));
    }
}
