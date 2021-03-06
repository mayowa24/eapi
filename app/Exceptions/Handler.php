<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\ExceptionTrait;
use Exception;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;
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
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($request->expectsJson()){
        //     if($exception instanceof ModelNotFoundException){
        //         return response()->json([
        //             'errors'=>'Product Model Not Found'
        //         ],Response::HTTP_NOT_FOUND);
    
        //     }
        // }

        // if($exception instanceof NotFoundHttpException){
        //     return response()->json([
        //         'errors'=>'Incorrect Route'
        //     ],Response::HTTP_NOT_FOUND);
        // }
        return $this->apiException($request, $exception);
    }
        return parent::render($request, $exception);
    }

}
 