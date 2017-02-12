<?php


class BaseViewFactoryTestCase extends BaseUnitTestCase {

    protected function setViewExpectations($view, $parameters = array())
    {
        $parameters = array_merge(
            array(
                'messageType'       => '',
                'messages'          => array(),
                'prefix'            => ''
            ),
            $parameters
        );

        View::shouldReceive('make')->with( $view, $parameters );
    }

    protected function assertViewName($view, $expected)
    {
        $this->assertEquals( $expected, $view->getName() );
    }

    protected function assertViewData($view, $primary, $expected)
    {
        $this->assertEquals( $expected, $view->getData()[$primary] );
    }

    protected function assertViewArrayData($view, $primary, $secondary, $expected)
    {
        $this->assertTrue( isset( $view->getData()[$primary][$secondary]) );
        $this->assertEquals( $expected, $view->getData()[$primary][$secondary] );
    }

    protected function assertViewCount($view, $primary, $expected)
    {
        $this->assertCount( $expected, $view->getData()[$primary] );
    }

    protected function assertViewNotNull($view, $primary)
    {
        $this->assertNotNull( $view->getData()[$primary] );
    }

    protected function assertViewInstanceOf($view, $primary, $instance)
    {
        $this->assertInstanceOf( $instance, $view->getData()[$primary] );
    }

    protected function assertViewDataSize($view, $primary, $size)
    {
        $this->assertEquals( $size, count($view->getData()[$primary]) );
    }

}
