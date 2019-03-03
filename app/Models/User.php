<?php namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail {

    use Notifiable;


    protected $table = 'users';

    protected $fillable = array(
        'first_name',
        'last_name',
        'email',
        'password',
    );

    protected $hidden = array(
        'password',
        'remember_token',
    );

    protected $dates = array(
        'email_verified_at',
    );


    public function getAuthIdentifierName()
    {
        return $this->email;
    }

}
