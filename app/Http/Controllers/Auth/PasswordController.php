<?php namespace App\Http\Controllers\Auth;


use Illuminate\Contracts\Auth\Guard;
use Ixudra\Core\Http\Controllers\BaseController;
use App\Events\PasswordUpdatedEvent;
use App\Events\PasswordResetEvent;
use App\Http\Requests\Auth\ChangePasswordFormRequest;
use App\Http\Requests\Auth\ResetPasswordFormRequest;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\Html\Auth\PasswordViewFactory;

use App;
use Event;
use Translate;

class PasswordController extends BaseController {

    protected $auth;

    protected $passwordViewFactory;


    public function __construct(Guard $auth, PasswordViewFactory $passwordViewFactory)
    {
        $this->auth = $auth;

        $this->passwordViewFactory = $passwordViewFactory;
    }


    public function showChangePassword()
    {
        return $this->passwordViewFactory->changePassword( $this->auth->user() );
    }

    public function processChangePassword(ChangePasswordFormRequest $request)
    {
        $this->auth->user()->resetPassword( $request->input( 'password_new' ) );
//        Event::dispatch( new PasswordUpdatedEvent( $this->auth->user() ) );

        return $this->redirect('admin.index', array(), 'success', array(Translate::recursive('authentication.changePassword.success')));
    }

    public function showResetPassword()
    {
        return $this->passwordViewFactory->resetPassword();
    }

    public function processResetPassword(ResetPasswordFormRequest $request)
    {
        $userRepository = App::make( EloquentUserRepository::class );
        $user = $userRepository->findByEmail( $request->getInput()[ 'email' ] );

        $user->resetPassword();
//        Event::dispatch( new PasswordResetEvent( $user ) );

        return $this->redirect('index', array(), 'success', array(Translate::recursive('authentication.resetPassword.success')));
    }

}
