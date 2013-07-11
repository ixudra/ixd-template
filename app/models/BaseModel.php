<?php


abstract class BaseModel extends Eloquent {

    public abstract function make($input);

    public abstract function modify($input);

    public abstract function remove();

    public static function getDefaults() { return array(); }

    protected function _convertToTruthyValue($input, $key)
    {
        if( array_key_exists( $key, $input ) ) {
            return true;
        }

        return false;
    }

    protected function _convertToArray($input, $key)
    {
        if( array_key_exists( $key, $input ) ) {
            return $input[$key];
        }

        return array();
    }
}
