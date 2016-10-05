<?php namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

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


    public function getAuthIdentifierName()
    {
        return $this->email;
    }

}
