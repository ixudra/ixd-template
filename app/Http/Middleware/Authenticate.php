<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {

    use RedirectableTrait;


    protected $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if( $this->auth->guest() ) {
            if( $request->ajax() ) {
                return response('Unauthorized.', 401);
            } else {
                return $this->redirect('login', array(), 'error', array(Translate::recursive('authentication.login.required')));
            }
        }

        return $next( $request );
    }

}
