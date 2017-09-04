<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Translate;

class RedirectIfAuthenticated {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if( Auth::guard($guard)->check() ) {
            return $this->redirect('index', array(), 'error', array(Translate::recursive('authentication.login.alreadyLoggedIn')));
        }

        return $next($request);
    }

}
