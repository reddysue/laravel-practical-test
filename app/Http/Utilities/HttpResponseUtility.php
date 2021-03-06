<?php
namespace App\Http\Utilities;

class HttpResponseUtility
{
    public function jsonResponse($data, $statusCode, $message)
    {
        return response()->json([
            'result' => $data,
            'statusCode' => $statusCode,
            'message'=> $message
        ], $statusCode);
    }

    public function successResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.success') , $message ?? config('message.successMsg'));
    }
    
    public function badRequestResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.badRequest'), $message ?? config('message.badRequestMsg'));
    }

    public function notFoundResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.badRequest'), $message ?? config('message.notFoundMsg'));
    }

    public function unauthorizedResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.unauthorized'), $message ?? config('message.notFoundMsg'));
    }
    
    public function createResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.created'), $message ?? config('message.createSuccessMsg'));
    }

    public function updateResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.updated'), $message ?? config('message.updateSuccessMsg'));
    }

    public function deleteResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.deleted'), $message ?? config('message.deleteSuccessMsg'));
    }
}
