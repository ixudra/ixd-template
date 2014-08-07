<?php


class BaseUnitTestCase extends Illuminate\Foundation\Testing\TestCase {

    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../../../bootstrap/start.php';
    }

}
