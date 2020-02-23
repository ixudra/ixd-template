<?php namespace App\Http\Middleware;


use Closure;
use Ixudra\Core\Traits\RedirectableTrait;

use Auth;
use Translate;

class IsActive {

    use RedirectableTrait;


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !$request->user()->isActive() ) {
            Auth::logout();

            return $this->redirect( 'login', array(), 'error', array( Translate::recursive( 'authorization.errors.accessDenied' ) ) );
        }

        return $next( $request );
    }

}
