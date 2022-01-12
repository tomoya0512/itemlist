<?php

namespace App\Exceptions;

use Exception;
<<<<<<< HEAD
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
=======
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

>>>>>>> ee3b45f27350e4dc8ecf9f19a533c9279578f0de

class Handler extends ExceptionHandler
{
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
=======

     protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        if (in_array('admin', $exception->guards(), true)) {
            return redirect()->guest(route('admin.login'));
        }

        return redirect()->guest(route('login'));
>>>>>>> ee3b45f27350e4dc8ecf9f19a533c9279578f0de
    }
}
