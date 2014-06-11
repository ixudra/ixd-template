<?php


class BaseRepository {

    protected function applyFilters($query, $filters = array())
    {
        foreach( $this->preProcessFilters($filters) as $key => $value ) {
            if( $value == '' ) {
                continue;
            }

            $query = $query->where($key, '=', $value);
        }

        return $query;
    }

    protected function preProcessFilters($filters)
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
