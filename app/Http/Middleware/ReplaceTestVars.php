<?php namespace App\Http\Middleware;


use Closure;
use Illuminate\Contracts\Foundation\Application;

class ReplaceTestVars {

    protected $app;


    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function handle($request, Closure $next)
    {
        if( $this->app->runningUnitTests() && $request->has('_token') ) {
            $input = $request->all();
            $input['_token'] = $request->session()->token();

            // we need to update _token value to make sure we get the POST / PUT tests passed.
            $request->replace( $input );
        }

        return $next( $request );
    }

}
