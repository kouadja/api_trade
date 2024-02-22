<?php

namespace App\Exceptions;

use Throwable;
use Psr\Log\LogLevel;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
{
    if ($exception instanceof AuthorizationException) {
        // Log the exception for debugging
        Log::error('AuthorizationException: ' . $exception->getMessage());

        // Return a JSON response with a custom message
        return response()->json([
            'message' => 'You don\'t have access to this resource!'
        ], 401);
    }

    // For other exceptions, proceed with the default rendering
    return parent::render($request, $exception);
}
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
