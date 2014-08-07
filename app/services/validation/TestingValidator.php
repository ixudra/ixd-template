<?php


class TestingValidator extends BaseModelValidator {

    protected $rules = array();

    protected $messages = array();

    protected function preProcessAttributes($attributes)
    {
        return $attributes;
    }

}


