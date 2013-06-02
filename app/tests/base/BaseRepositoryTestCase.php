<?php


class BaseRepositoryTestCase extends BaseTestCase {

    protected function _assertCollectionWithOnlyInstancesOf($type, $items)
    {
        foreach( $items as $item )
        {
            $this->assertInstanceOf($type, $item);
        }
    }

    protected function _assertCollectionContains($collection, $items)
    {
        foreach( $collection as $object )
        {
            $found = false;
            foreach( $items as $key => $value )
            {
                if( $object->id == $value->id ) {
                    unset( $items[$key]);
                    $found = true;
                    break;
                }
            }

            $this->assertTrue( $found );
        }

        $this->assertTrue( sizeof($items ) == 0 );
    }

}