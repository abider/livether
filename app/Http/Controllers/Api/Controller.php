<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected function success($message = null, $data = null)
    {
        return $this->apiResponse(true, $message, $data);
    }

    protected function error($message = null, $data = null)
    {
        return $this->apiResponse(false, $message, $data);
    }

    protected function apiResponse($result, $message = null, $data = null)
    {
        $response =  compact('result');

        if (!is_null($message)) {
            $response = array_merge($response, compact('message'));
        }

        if (!is_null($data)) {
            $response = array_merge($response, compact('data'));
        }

        return $response;
    }
}
