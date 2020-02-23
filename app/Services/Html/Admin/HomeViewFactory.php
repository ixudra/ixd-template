<?php namespace App\Services\Html\Admin;


class HomeViewFactory extends BaseViewFactory {

    public function index()
    {
        return $this->makeView( 'admin.index' );
    }

}
