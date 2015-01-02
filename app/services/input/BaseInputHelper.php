<?php


abstract class BaseInputHelper {

    abstract public function getDefaultInput();

    public function getInputForModel(BaseModel $model)
    {
        return $model->attributesToArray();
    }

    public function getInputForSearch($input)
    {
        if( array_key_exists('_token', $input) ) {
            unset( $input[ '_token' ] );
        }

        return $input;
    }

}
