<?php


class BaseUnitTestCase extends \Codeception\TestCase\Test {

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $appUrl = 'http://yourAppName.test';


    public function setUp()
    {
        Gate::shouldReceive('authorize')->andReturn(true);

        return parent::setUp();
    }

}
