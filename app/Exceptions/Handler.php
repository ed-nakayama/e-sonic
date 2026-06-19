<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException; 

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
//    public function report(Exception $exception)
    public function report(Throwable $exception)
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
//    public function render($request, Exception $exception)
    public function render($request, Throwable $exception)
    {
        // トークンミスが発生した場合
        if ($exception instanceof \Illuminate\Session\TokenMismatchException){
            // 前の画面に戻るのではなく、新しいセッションでログイン画面へ直接リダイレクトする
            return redirect()
                ->route('login') // または直接 URL を指定する場合は ->to('/login')
                ->withErrors([trans('auth.failed')]);
        }

        return parent::render($request, $exception);
    }
}
