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
        Lang::shouldReceive('get')->once()->with('models.Foo.article')->andReturn('Baz');
        Lang::shouldReceive('get')->once()->with('model.Bar', array( 'model' => 'Foz', 'article' => 'Baz' ))->andReturn('FooBar');

        $this->assertEquals('FooBar', $this->translationHelper->translateMessage('Foo.Bar'));
    }

    /**
     * @covers TranslationHelper::translateModel()
     */
    public function testTranslateModel()
    {
        Lang::shouldReceive('get')->once()->with('models.Foo.singular')->andReturn('Foz');
        Lang::shouldReceive('get')->once()->with('models.Foo.article')->andReturn('Baz');
        Lang::shouldReceive('get')->once()->with('model.Bar', array( 'model' => 'Foz', 'article' => 'Baz' ))->andReturn('FooBar');

        $this->assertEquals('FooBar', $this->translationHelper->translateModel('Foo.Bar'));
    }

    /**
     * @covers TranslationHelper::translateRecursive()
     */
    public function testTranslateRecursive()
    {
        Lang::shouldReceive('has')->once()->with('admin.menu.title.new')->andReturn(true);
        Lang::shouldReceive('get')->once()->with('admin.menu.title.new')->andReturn('new ##models.:model.singular##');
        Lang::shouldReceive('get')->once()->with('models.user.singular')->andReturn('user');

        $this->assertEquals('New user', $this->translationHelper->translateRecursive('admin.menu.title.new', array('model' => 'user')));
    }

    /**
     * @covers TranslationHelper::translateRecursive()
     */
    public function testTranslateRecursive_translatesMultipleMarkers()
    {
        Lang::shouldReceive('has')->once()->with('admin.menu.title.new')->andReturn(true);
        Lang::shouldReceive('get')->once()->with('admin.menu.title.new')->andReturn('no ##models.:model.singular## for the ##models.:value.singular##');
        Lang::shouldReceive('get')->once()->with('models.user.singular')->andReturn('rest');
        Lang::shouldReceive('get')->once()->with('models.other.singular')->andReturn('wicked');

        $this->assertEquals('No rest for the wicked', $this->translationHelper->translateRecursive('admin.menu.title.new', array('model' => 'user', 'value' => 'other')));
    }

    /**
     * @covers TranslationHelper::translateRecursive()
     */
    public function testTranslateRecursive_noUcFirstIfNotRequired()
    {
        Lang::shouldReceive('has')->once()->with('admin.menu.title.new')->andReturn(true);
        Lang::shouldReceive('get')->once()->with('admin.menu.title.new')->andReturn('new ##models.:model.singular##');
        Lang::shouldReceive('get')->once()->with('models.user.singular')->andReturn('user');

        $this->assertEquals('new user', $this->translationHelper->translateRecursive('admin.menu.title.new', array('model' => 'user'), false));
    }

}