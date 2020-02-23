<?php namespace App\Presenters;


use Ixudra\Core\Presenters\BasePresenter;

class UserPresenter extends BasePresenter {

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function isActive()
    {
        return $this->truthy( $this->active );
    }

}
