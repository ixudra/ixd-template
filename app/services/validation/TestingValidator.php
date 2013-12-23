<?php


class TestingValidator extends BaseModelValidator {

    protected $rules = array();

    protected $messages = array();

    protected function _preProcessAttributes($attributes)
    {
        return $attributes;
    }

}


