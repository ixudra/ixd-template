<?php namespace App\Http\Controllers\Auth;


use Illuminate\Contracts\Auth\Guard;
use Ixudra\Core\Http\Controllers\BaseController;
use App\Events\UserRegisteredEvent;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\ChangeEmailFormRequest;
use App\Services\Factories\UserFactory;
use App\Services\Html\Auth\AuthViewFactory;

use Event;
use Translate;

class AuthController extends BaseController {

    protected $authViewFactory;


    public function __construct(Guard $auth, AuthViewFactory $authViewFactory)
    {
        $this->auth = $auth;

        $this->authViewFactory = $authViewFactory;
    }


    public function showRegister()
    {
        return $this->authViewFactory->register();
    }

    public function processRegister(RegisterFormRequest $request, UserFactory $userFactory)
    {
        $user = $userFactory->make( $request->getInput() );
        Event::dispatch( new UserRegisteredEvent( $user ) );

        return $this->redirect('index', array(), 'success', array(Translate::recursive('authentication.register.success')));
    }

    public function showLogin()
    {
        return $this->authViewFactory->login();
    }

    public function processLogin(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials[ 'active' ] = true;

        if( $this->auth->attempt( $credentials, $request->getInput()[ 'remember'] ) ) {
            return $this->redirect('admin.index', array(), 'success', array(Translate::recursive('authentication.login.success')));
        }

        return $this->redirect('login', array(), 'error', array(Translate::recursive('authentication.login.dataIncorrect')));
    }

    public function logout()
    {
        $this->auth->logout();

        return $this->redirect('index', array(), 'success', array(Translate::recursive('authentication.logout.success')));
    }

    public function showChangeEmail()
    {
        return $this->authViewFactory->changeEmail( $this->auth->user() );
    }

    public function processChangeEmail(ChangeEmailFormRequest $request)
    {
        $this->auth->user()->changeEmail( $request->get('email_new') );

        return $this->redirect('index', array(), 'success', array(Translate::recursive('authentication.changeEmail.success')));
    }

}
