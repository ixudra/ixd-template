<?php


class BaseViewFactoryTestCase extends BaseTestCase {

    protected function _assertViewName($view, $expected)
    {
        $this->assertEquals( $expected, $view->getName() );
    }

    protected function _assertViewData($view, $primary, $expected)
    {
        $this->assertEquals( $expected, $view->getData()[$primary] );
    }

    protected function _assertViewArrayData($view, $primary, $secondary, $expected)
    {
        $this->assertTrue( isset( $view->getData()[$primary][$secondary]) );
        $this->assertEquals( $expected, $view->getData()[$primary][$secondary] );
    }

    protected function _assertViewCount($view, $primary, $expected)
    {
        $this->assertCount( $expected, $view->getData()[$primary] );
    }

    protected function _assertViewNotNull($view, $primary)
    {
        $this->assertNotNull($view->getData()[$primary] );
    }

    protected function _assertViewInstanceOf($view, $primary, $instance)
    {
        $this->assertInstanceOf( $instance, $view->getData()[$primary] );
    }

    protected function _assertViewDataSize($view, $primary, $size)
    {
        $this->assertEquals( $size, sizeof($view->getData()[$primary]) );
    }

}
