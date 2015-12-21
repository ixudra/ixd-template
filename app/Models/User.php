<?php namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

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
