<?php namespace App\Services\Html;


class HomeViewFactory extends BaseViewFactory {

    public function index()
    {
        return $this->makeView( 'home.index' );
    }

}
