<?php namespace App\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;

use Config;

class HomeViewFactory extends BaseViewFactory {

    public function index()
    {
        return $this->makeView( Config::get('app.themes.frontend') .'.home.index' );
    }

}