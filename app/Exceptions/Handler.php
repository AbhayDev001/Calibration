<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     *
     * @throws \Exception
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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        //return parent::render($request, $exception);
        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                case '403':
                return \Response::view('ErrorPage',['ErrorType'=>403],403);
                break;

                case '404':
                return \Response::view('ErrorPage',['ErrorType'=>404],404);
                break;

                case '500':
                return \Response::view('ErrorPage',['ErrorType'=>500],500);
                break;

                default:
                return $this->renderHttpException($exception);
                break;
            }
        } else {
            return parent::render($request, $exception);
        }
    }
}
