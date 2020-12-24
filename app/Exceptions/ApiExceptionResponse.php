<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function class_basename;
use function strtolower;

trait ApiExceptionResponse
{
    use ApiResponse;

    protected function ValidationExceptionToResponse(ValidationException $e)
    {
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponse($errors, 422);
    }

    protected function modelNotFoundExceptionResponse(ModelNotFoundException $e)
    {
        $modelName = strtolower(class_basename( $e->getModel()));
        $params = $e->getIds();
        return $this->errorResponse("There is no any $modelName with $params[0]", 404);
    }

    protected function notFoundHttpExceptionResponse(NotFoundHttpException $e)
    {
        return $this->errorResponse("Invalid Url, Please Specify a valid Url", 404);
    }

    protected function unauthenticatedResponse(AuthenticationException $exception)
    {
        return  $this->errorResponse($exception->getMessage(), 401);
    }

    protected function authorizationExceptionResponse(AuthorizationException $exception)
    {
        return  $this->errorResponse($exception->getMessage(), 403);
    }

    protected function methodNotAllowedHttpExceptionResponse(MethodNotAllowedHttpException $exception)
    {
        return  $this->errorResponse($exception->getMessage(), 405);
    }

    protected function httpExceptionResponse(HttpException $exception)
    {
        return  $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
    }

    protected function queryExceptionResponse(QueryException $exception)
    {
        return $this->errorResponse($exception->errorInfo[2],409); //409 conflict
    }

    protected function generalExceptionResponse()
    {
        return $this->errorResponse('Unexpected Exception, Please try later',500);
    }

}
