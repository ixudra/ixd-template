<?php namespace App\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory as CoreBaseViewFactory;

use Config;

abstract class BaseViewFactory extends CoreBaseViewFactory {

    /**
     * Create the view
     *
     * @param   string $view Name of the template to be created
     *
     * @return \Illuminate\Contracts\View\View
     */
    protected function makeView($view, $route = '')
    {
        return parent::makeView(Config::get('app.themes.frontend') . '.' . $view);
    }

}
