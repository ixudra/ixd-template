<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Presenters\RolePresenter;

class Role extends Model {

    use PresentableTrait;


    protected $table = 'roles';

    protected $fillable = array(
        'key',
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'role';

    protected $presenter = RolePresenter::class;


    public function users()
    {
        return $this->belongsToMany( User::class, 'user_roles', 'role_id', 'user_id');
    }


    /**
     * @codeCoverageIgnore
     */
    public static function getRules()
    {
        return array(
            'key'                   => 'required|max:128',
        );
    }

    /**
     * @codeCoverageIgnore
     */
    public static function getDefaults()
    {
        return array(
            'key'                   => '',
        );
    }

}
