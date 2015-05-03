<?php namespace App\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use App\Services\Html\HomeViewFactory;

class HomeController extends BaseController {

    protected $homeViewFactory;


    public function __construct(HomeViewFactory $homeViewFactory)
    {
        $this->homeViewFactory = $homeViewFactory;
    }


    public function index()
    {
        return $this->homeViewFactory->index();
    }

}
