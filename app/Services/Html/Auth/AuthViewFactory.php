<?php namespace App\Services\Html\Auth;


use App\Services\Html\BaseViewFactory;

class AuthViewFactory extends BaseViewFactory {

    public function register($input = null)
    {
        if( $input === null ) {
            $input = array(
                'first_name'                    => '',
                'last_name'                     => '',
                'email'                         => '',
                'password'                      => '',
                'password_confirm'              => '',
                'terms'                         => false,
            );
        }

        $requiredFields = array(
            'first_name',
            'last_name',
            'email',
            'password',
            'password_confirm',
            'terms',
        );

        $this->addParameter( 'input', $input );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView('auth.register');
    }

    public function login($input = null)
    {
        if( $input === null ) {
            $input = array(
                'email'             => '',
                'remember'          => true,
            );
        }

        $requiredFields = array(
            'email',
            'password',
        );

        $this->addParameter( 'input', $input );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView( 'auth.login' );
    }

    public function changeEmail($user, $input = null)
    {
        if( $input === null ) {
            $input = array(
                'email_old'         => $user->email,
                'email_new'         => '',
                'email_confirm'     => '',
                'password'          => '',
            );
        }

        $requiredFields = array(
            'email_old',
            'email_new',
            'email_confirm',
            'password',
        );

        $this->addParameter( 'user', $user );
        $this->addParameter( 'input', $input );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView( 'auth.changeEmail' );
    }

}
