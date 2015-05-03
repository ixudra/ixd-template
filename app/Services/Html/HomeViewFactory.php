<?php namespace App\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;

class HomeViewFactory extends BaseViewFactory {

    public function index()
    {
        return $this->makeView('bootstrap.home.index');
    }

}