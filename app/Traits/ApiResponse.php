<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use function response;

trait ApiResponse
{
    public function successResponse($data, $code = 200) : JsonResponse
    {
        return response()->json( ['data' => $data], $code);
    }

    public function errorResponse($message, $code = 404) : JsonResponse
    {
        return response()->json( ['error' => $message, 'code'=>$code], $code);
    }

    public function createdResponse($data, $code = 201) : JsonResponse
    {
        return response()->json( ['data' => $data], $code);
    }
}
