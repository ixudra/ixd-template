<?php namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use App\Presenters\UserPresenter;
use App\Repositories\Eloquent\EloquentRoleRepository;

use App;
use Hash;

class User extends Authenticatable {

    use Authorizable, Notifiable, PresentableTrait, SoftDeletes;


    protected $table = 'users';

    protected $fillable = array(
        'first_name',
        'last_name',
        'email',
        'password',
        'active',
    );

    protected $hidden = array(
        'password',
        'remember_token',
    );

    protected $dates = array(
        'email_verified_at',
    );

    protected $translationKey = 'user';

    protected $presenter = UserPresenter::class;


    public function roles()
    {
        return $this->belongsToMany( Role::class, 'user_roles', 'user_id', 'role_id' );
    }


    /**
     * @codeCoverageIgnore
     */
    public static function getRules()
    {
        return array(
            'first_name'            => 'required|max:64',
            'last_name'             => 'required|max:64',
            'email'                 => 'required|max:128|email|unique:users,email',
            'password'              => 'required',
            'active'                => 'nullable',
        );
    }

    /**
     * @codeCoverageIgnore
     */
    public static function getDefaults()
    {
        return array(
            'first_name'            => '',
            'last_name'             => '',
            'email'                 => '',
            'password'              => '',
            'active'                => true,
        );
    }


    public function changeEmail($email)
    {
        $this->email = $email;
        $this->save();
    }

    public function resetPassword($password = '')
    {
        if( $password === '' ) {
            $password = Str::random(10);
        }

        $this->password = Hash::make($password);
        $this->save();

        return $password;
    }

    public function isAdmin()
    {
        return $this->hasRole( 'admin' );
    }

    public function hasRole($role)
    {
        return App::make( EloquentRoleRepository::class )->getRoleForUser( $this->id, $role ) !== null;
    }

    public function isActive()
    {
        return $this->active;
    }

}
