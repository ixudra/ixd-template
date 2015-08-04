<?php


class BaseAdminControllerTestCase extends BaseUnitTestCase {

    public function setUp()
    {
        parent::setUp();

        $userMock = Mockery::mock('\App\Models\User');
        $userMock->shouldReceive('isAdmin')->once()->andReturn(true);
        $this->be( $userMock );
    }

}
