<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Traits\ApiResponse;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        //handle exceptions here
        $this->renderable(function (NotFoundHttpException $e) {
            return $this->notFoundResponse('Resource not found');
        });
        $this->renderable(function (MethodNotAllowedHttpException $e) {
            return $this->methodNotAllowed($e->getMessage());
        });
        $this->renderable(function (AuthenticationException $e) {
            return $this->authenticationRequiredResponse();
        });
    }
}
