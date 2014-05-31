<?php


class TranslationHelperTest extends BaseTestCase {

    protected $translationHelper = null;


    public function setUp()
    {
        parent::setUp();

        $this->translationHelper = App::make('TranslationHelper');
    }


    /**
     * @covers TranslationHelper::translateMessage()
     */
    public function testTranslateMessage()
    {
        Lang::shouldReceive('get')->once()->with('Foo')->andReturn('Bar');

        $this->assertEquals('Bar', $this->translationHelper->translateMessage('Foo'));
    }

    /**
     * @covers TranslationHelper::translateMessage()
     */
    public function testTranslateModel()
    {
        Lang::shouldReceive('get')->once()->with('models.Foo.singular')->andReturn('Foz');
        Lang::shouldReceive('get')->once()->with('models.Foo.attribute')->andReturn('Baz');
        Lang::shouldReceive('get')->once()->with('model.Bar', array( 'model' => 'Foz', 'attribute' => 'Baz' ))->andReturn('FooBar');

        $this->assertEquals('FooBar', $this->translationHelper->translateModel('Foo.Bar'));
    }

}