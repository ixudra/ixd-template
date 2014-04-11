<?php


class BaseModelResponseTest extends BaseTestCase {

    protected static $baseModelResponse;


    public function setUp()
    {
        self::$baseModelResponse = new BaseModelResponse();
    }


    /**
     * @covers BaseModelResponse::addNotifications()
     * @covers BaseModelResponse::getNotifications()
     */
    public function testNotifications()
    {
        self::$baseModelResponse->addNotifications('success', array('Foo_1'));
        self::$baseModelResponse->addNotifications('success', array('Foo_2'));
        self::$baseModelResponse->addNotifications('error', array('Foo_3'));

        $successes = self::$baseModelResponse->getNotifications('success');
        $errors = self::$baseModelResponse->getNotifications('error');
        $info = self::$baseModelResponse->getNotifications('info');

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

        self::$baseModelResponse = new BaseModelResponse();

        self::$baseModelResponse->addNotifications('success', array('Foo_1'), true);
        self::$baseModelResponse->addNotifications('success', array('Foo_2'));

        $successes = self::$baseModelResponse->getNotifications('success');

        $this->assertCount( 2, $successes );
        $this->assertEquals( 'Bar_1', $successes[0] );
        $this->assertEquals( 'Foo_2', $successes[1] );
    }

    /**
     * @covers BaseModelResponse::isSuccessful()
     */
    public function testIsSuccessful_returnsTrueIfResponseContainsNoErrorNotifications()
    {
        self::$baseModelResponse->addNotifications('success', array('Foo_1'));
        self::$baseModelResponse->addNotifications('info', array('Foo_2'));

        $this->assertTrue( self::$baseModelResponse->isSuccessful() );
    }

    /**
     * @covers BaseModelResponse::isSuccessful()
     */
    public function testIsSuccessful_returnsFalseIfResponseContainsErrorNotification()
    {
        self::$baseModelResponse->addNotifications('error', array('Foo_1'));

        $this->assertFalse( self::$baseModelResponse->isSuccessful() );
    }

    /**
     * @covers BaseModelResponse::isUnsuccessful()
     */
    public function testIsUnsuccessful_returnsFalseIfResponseContainsNoErrorNotifications()
    {
        self::$baseModelResponse->addNotifications('success', array('Foo_1'));
        self::$baseModelResponse->addNotifications('info', array('Foo_2'));

        $this->assertFalse( self::$baseModelResponse->isUnsuccessful() );
    }

    /**
     * @covers BaseModelResponse::isUnsuccessful()
     */
    public function testIsUnsuccessful_returnsFalseIfResponseContainsErrorNotification()
    {
        self::$baseModelResponse->addNotifications('error', array('Foo_1'));

        $this->assertTrue( self::$baseModelResponse->isUnsuccessful() );
    }

}