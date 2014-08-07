<?php


class TranslationHelperTest extends BaseUnitTestCase {

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
        Lang::shouldReceive('has')->once()->with('models.Foo.singular')->andReturn(false);
        Lang::shouldReceive('get')->once()->with('Foo.Bar')->andReturn('Baz');

        $this->assertEquals('Baz', $this->translationHelper->translateMessage('Foo.Bar'));
    }

    /**
     * @covers TranslationHelper::translateMessage()
     * @covers TranslationHelper::translateModel()
     */
    public function testTranslateMessage_translatesModelMessageIfPossible()
    {
        Lang::shouldReceive('has')->once()->with('models.Foo.singular')->andReturn(true);

        Lang::shouldReceive('get')->once()->with('models.Foo.singular')->andReturn('Foz');
        Lang::shouldReceive('get')->once()->with('models.Foo.attribute')->andReturn('Baz');
        Lang::shouldReceive('get')->once()->with('model.Bar', array( 'model' => 'Foz', 'attribute' => 'Baz' ))->andReturn('FooBar');

        $this->assertEquals('FooBar', $this->translationHelper->translateMessage('Foo.Bar'));
    }

    /**
     * @covers TranslationHelper::translateModel()
     */
    public function testTranslateModel()
    {
        Lang::shouldReceive('get')->once()->with('models.Foo.singular')->andReturn('Foz');
        Lang::shouldReceive('get')->once()->with('models.Foo.attribute')->andReturn('Baz');
        Lang::shouldReceive('get')->once()->with('model.Bar', array( 'model' => 'Foz', 'attribute' => 'Baz' ))->andReturn('FooBar');

        $this->assertEquals('FooBar', $this->translationHelper->translateModel('Foo.Bar'));
    }

}