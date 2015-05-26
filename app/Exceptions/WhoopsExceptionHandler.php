<?php namespace App\Exceptions;


use Exception;
use Illuminate\Http\Response;
use App\Exceptions\Handler as BaseExceptionHandler;

class WhoopsExceptionHandler extends BaseExceptionHandler {

    public function render($request, Exception $e)
    {
        if( env('APP_ENV') == 'testing' ) {
            return parent::render($request, $e);
        }

        $whoops = new \Whoops\Run;

        if( $request->ajax() ) {
            $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
        } else {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        }

        return new Response($whoops->handleException($e), $e->getStatusCode(), $e->getHeaders());
    }

}