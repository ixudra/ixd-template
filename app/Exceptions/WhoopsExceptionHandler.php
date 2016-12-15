<?php namespace App\Exceptions;


use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Response;
use App\Exceptions\Handler as BaseExceptionHandler;

use Exception;
use Config;

class WhoopsExceptionHandler extends BaseExceptionHandler {

    public function render($request, Exception $e)
    {
        if( !Config::get('app.debug') ) {
            return parent::render($request, $e);
        }

        // Laravel throws HttpResponseExceptions when validating through FormRequests. In this case,
        // we don't want to render the exception but rather redirect the user to the form in order
        // to show the error messages. This is handle by the framework, so we pass along the
        // exception for further processing.
        if( $e instanceof HttpResponseException ) {
            return parent::render( $request, $e );
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