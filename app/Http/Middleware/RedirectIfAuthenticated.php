<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Ixudra\Core\Traits\RedirectableTrait;

use Closure;
use Translate;

class RedirectIfAuthenticated {

    use RedirectableTrait;


    protected $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if( $this->auth->check() ) {
            return $this->redirect('index', array(), 'error', array(Translate::recursive('authentication.login.alreadyLoggedIn')));
        }

        return $next($request);
    }

}
