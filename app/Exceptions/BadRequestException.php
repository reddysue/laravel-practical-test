<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'result' => null,
            'statusCode' => config('http_status.badRequest'),
            'message' => empty($this->getMessage()) ? config('message.badRequestMsg') : $this->getMessage(),
        ], config('http_status.badRequest'));
    }
}
