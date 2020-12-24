<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use function config;

class Handler extends ExceptionHandler
{
    use ApiExceptionResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {

        if ($e instanceof ValidationException)
            return $this->ValidationExceptionToResponse($e);
        elseif ($e instanceof ModelNotFoundException)
            return $this->modelNotFoundExceptionResponse($e);
        elseif ($e instanceof NotFoundHttpException)
            return $this->notFoundHttpExceptionResponse($e);
        elseif ($e instanceof AuthenticationException)
            return $this->unauthenticatedResponse($e);
        elseif ($e instanceof AuthorizationException)
            return $this->authorizationExceptionResponse($e);
        elseif ($e instanceof MethodNotAllowedHttpException)
            return $this->methodNotAllowedHttpExceptionResponse($e);
        elseif ($e instanceof HttpException)
            return $this->httpExceptionResponse($e);
        elseif ($e instanceof QueryException)
            return $this->queryExceptionResponse($e);
        elseif (config('app.debug'))
            return parent::render($request, $e);

        return $this->generalExceptionResponse();
    }

}
