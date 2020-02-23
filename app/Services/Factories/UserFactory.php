<?php namespace App\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use App\Models\User;

class UserFactory extends BaseFactory {

    public function make($input, $prefix = '')
    {
        $password = '';
        if( array_key_exists('password', $input) ) {
            $password = $input[ 'password' ];
        }
        $input[ 'password' ] = '';

        $user = User::create( $this->extractInput( $input, User::getDefaults(), $prefix, true ) );

        $user->resetPassword( $password );

        if( array_key_exists('roles', $input) ) {
            $user->roles()->sync( $input[ 'roles' ] );
        }

        return $user;
    }

    public function modify($user, $input, $prefix = '')
    {
        if( array_key_exists('email', $input ) ) {
            unset( $input[ 'email' ] );
        }

        $user->update( $this->extractInput( $input, User::getDefaults(), $prefix ) );

        if( array_key_exists('roles', $input) ) {
            $user->roles()->sync( $input[ 'roles' ] );
        }

        return $user;
    }

}
