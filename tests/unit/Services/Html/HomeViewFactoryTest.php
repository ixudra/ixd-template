<?php


use App\Services\Html\HomeViewFactory;

class HomeViewFactoryTest extends BaseViewFactoryTestCase {

    protected $homeViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->homeViewFactory = App::make( HomeViewFactory::class );
    }


    /**
     * @covers \App\Services\Html\HomeViewFactory::index()
     */
    public function testIndex()
    {
        $this->setViewExpectations( 'frontendTheme.home.index' );

        $view = $this->homeViewFactory->index();
    }

}