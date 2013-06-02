<?php


abstract class BaseModel extends Eloquent {

    public abstract function make($input);

    public abstract function modify($input);

    public abstract function remove();

    public static function getDefaults() { return array(); }
}
