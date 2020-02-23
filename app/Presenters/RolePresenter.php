<?php namespace App\Presenters;


use Ixudra\Core\Presenters\BasePresenter;

use Translate;

class RolePresenter extends BasePresenter {

    public function fullName()
    {
        return Translate::recursive('roles.names.'. $this->entity->key);
    }

}
