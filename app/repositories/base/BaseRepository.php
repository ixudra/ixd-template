<?php


class BaseRepository {

    protected function _preProcessFilters($filters)
    {
        foreach( $filters as $key => $value ) {
            if( $value === true ) {
                $filters[$key] = '1';
                continue;
            }

            if( $value === false ) {
                $filters[$key] = '0';
                continue;
            }
        }
        
        return $filters;
    }

}
