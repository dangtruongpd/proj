<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{    
    /**
     * getMessage
     *
     * @param  mixed $code
     * @return string
     */
    public function getMessage($code)
    {
        return isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : "";
    }
    
    /**
     * build
     *
     * @param  mixed $main
     * @param  mixed $extra
     * @return mixed
     */
    public function build($main = [], $extra = [])
    {
        $responseBody = [
            'status' => $main['status'],
            'message' => $this->getMessage($main['code']),
            'status_code' => $main['code'],
        ];

        if (!empty($main['data'])) {
            $responseBody['data'] = $main['data'];
        }

        if (!empty($main['errors'])) {
            $responseBody['errors'] = $main['errors'];
        }

        if (!empty($extra)) {
            $responseBody = array_merge($responseBody, $extra);
        }

        $responseBody = array_filter($responseBody, function ($val) {
            return !is_null($val);
        });

        return response($responseBody, $main['code']);
    }
    
    /**
     * succeedResponse
     *
     * @param  mixed $statusCode
     * @param  mixed $data
     * @param  mixed $extra
     * @return mixed
     */
    public function succeedResponse($statusCode = null, $data = [], $extra = [])
    {
        return $this->build([
            'status' => 'success',
            'code' => $statusCode,
            'data' => $data
        ], $extra);
    }
    
    /**
     * failedResponse
     *
     * @param  mixed $errorCode
     * @param  mixed $errors
     * @param  mixed $extra
     * @return mixed
     */
    public function failedResponse($errorCode = null, $errors = [], $extra = [])
    {
        return $this->build([
            'status' => 'error',
            'code' => $errorCode,
            'errors' => $errors
        ], $extra);
    }
}