<?php


class BaseModelResponseTest extends BaseUnitTestCase {

    protected $baseModelResponse;


    public function setUp()
    {
        parent::setUp();
        
        $this->baseModelResponse = new BaseModelResponse();
    }


    /**
     * @covers BaseModelResponse::addNotifications()
     * @covers BaseModelResponse::getNotifications()
     */
    public function testNotifications()
    {
        $this->baseModelResponse->addNotifications('success', array('Foo_1'));
        $this->baseModelResponse->addNotifications('success', array('Foo_2'));
        $this->baseModelResponse->addNotifications('error', array('Foo_3'));

        $successes = $this->baseModelResponse->getNotifications('success');
        $errors = $this->baseModelResponse->getNotifications('error');
        $info = $this->baseModelResponse->getNotifications('info');

        $this->assertCount( 2, $successes );
        $this->assertEquals( 'Foo_1', $successes[0] );
        $this->assertEquals( 'Foo_2', $successes[1] );

        $this->assertCount( 1, $errors );
        $this->assertEquals( 'Foo_3', $errors[0] );

        $this->assertCount( 0, $info );
    }

    /**
     * @covers BaseModelResponse::addNotifications()
     * @covers BaseModelResponse::getNotifications()
     */
    public function testAddNotifications_translatesMessageIfParameterIsTrue()
    {
        $translationHelperMock = Mockery::mock('TranslationHelper');
        $translationHelperMock->shouldReceive('translateModel')->once()->with('Foo_1')->andReturn('Bar_1');
        App::instance('TranslationHelper', $translationHelperMock);

        $this->baseModelResponse = new BaseModelResponse();

        $this->baseModelResponse->addNotifications('success', array('Foo_1'), true);
        $this->baseModelResponse->addNotifications('success', array('Foo_2'));

        $successes = $this->baseModelResponse->getNotifications('success');

        $this->assertCount( 2, $successes );
        $this->assertEquals( 'Bar_1', $successes[0] );
        $this->assertEquals( 'Foo_2', $successes[1] );
    }

    /**
     * @covers BaseModelResponse::isSuccessful()
     */
    public function testIsSuccessful_returnsTrueIfResponseContainsNoErrorNotifications()
    {
        $this->baseModelResponse->addNotifications('success', array('Foo_1'));
        $this->baseModelResponse->addNotifications('info', array('Foo_2'));

        $this->assertTrue( $this->baseModelResponse->isSuccessful() );
    }

    /**
     * @covers BaseModelResponse::isSuccessful()
     */
    public function testIsSuccessful_returnsFalseIfResponseContainsErrorNotification()
    {
        $this->baseModelResponse->addNotifications('error', array('Foo_1'));

        $this->assertFalse( $this->baseModelResponse->isSuccessful() );
    }

    /**
     * @covers BaseModelResponse::isUnsuccessful()
     */
    public function testIsUnsuccessful_returnsFalseIfResponseContainsNoErrorNotifications()
    {
        $this->baseModelResponse->addNotifications('success', array('Foo_1'));
        $this->baseModelResponse->addNotifications('info', array('Foo_2'));

        $this->assertFalse( $this->baseModelResponse->isUnsuccessful() );
    }

    /**
     * @covers BaseModelResponse::isUnsuccessful()
     */
    public function testIsUnsuccessful_returnsFalseIfResponseContainsErrorNotification()
    {
        $this->baseModelResponse->addNotifications('error', array('Foo_1'));

        $this->assertTrue( $this->baseModelResponse->isUnsuccessful() );
    }

}