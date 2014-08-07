<?php


class BaseRepositoryTestCase extends BaseFunctionalTestCase {

    protected function assertCollectionWithOnlyInstancesOf($type, $items)
    {
        foreach( $items as $item ) {
            $this->assertInstanceOf( $type, $item );
        }
    }

    protected function assertCollectionContains($expected, $actual)
    {
        foreach( $actual as $object ) {
            $found = false;

            foreach( $expected as $key => $value ) {
                if( $object->id == $value->id ) {
                    unset( $expected[$key] );
                    $found = true;
                    break;
                }
            }

            $this->assertTrue( $found );
        }

        $this->assertTrue( sizeof( $expected ) == 0 );
    }

    protected function assertCollectionContainsInOrder($expected, $actual)
    {
        $this->assertTrue( sizeof( $expected ) == sizeof( $actual ) );

        for( $i = 0; $i < sizeof( $actual ); ++$i ) {
            $this->assertEquals( $expected[$i]->id, $actual[$i]->id );
        }
    }

}