<?php


abstract class BaseFormHelper {

    protected $repository;


    public function getAllAsSelectList($includeNull = false)
    {
        $models = $this->repository->all();

        return $this->convertToSelectList($includeNull, $models);
    }

    public function getSuggestionsForAutoComplete($query)
    {
        $models = $this->repository->findByFilter( array( 'name' => $query ) );

        return $this->convertToAutoComplete( $models );
    }

    protected function convertToSelectList($includeNull, $models)
    {
        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = '';
        }

        foreach( $models as $model ) {
            $results[ $model->id ] = $model->name;
        }

        return $results;
    }

    protected function convertToAutoComplete($models)
    {
        $results = array();
        foreach( $models as $model ) {
            $results[] = array(
                'data'          => $model->id,
                'value'         => $model->name
            );
        }

        return $results;
    }

}