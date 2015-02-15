<?php namespace App\Services\Validation;


trait AppValidationTrait {

    public function validateEan($attribute, $value, $parameters)
    {
        if( preg_match('/^[0-9]{13}$/', $value) != 1 ) {
            return false;
        }

        return true;
    }

    public function validateCnk($attribute, $value, $parameters)
    {
        if( preg_match('/^[0-9]{7}$/', $value) != 1 ) {
            return false;
        }

        return true;
    }

}