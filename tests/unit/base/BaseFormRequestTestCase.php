<?php


use App\Services\Validation\AppValidator;
use Illuminate\Contracts\Validation\Factory;

class BaseFormRequestTestCase extends BaseUnitTestCase {

    public function setUp()
    {
        $validator = Mockery::mock( AppValidator::class );
        $validator->shouldReceive('passes')->once()->andReturn(true);
        App::instance( AppValidator::class, $validator );

        $validationFactory = Mockery::mock( Factory::class );
        $validationFactory->shouldReceive('make')->once()->andReturn($validator);
        App::instance( Factory::class, $validationFactory );

        return parent::setUp();
    }

}
