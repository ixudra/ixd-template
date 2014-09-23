<?php


use Ixudra\Validation\DateValidationTrait;
use Ixudra\Validation\TimeValidationTrait;
use Ixudra\Validation\FileValidationTrait;
use Ixudra\Validation\JsonValidationTrait;
use Ixudra\Validation\UserValidationTrait;
use Ixudra\Validation\ArrayValidationTrait;
use Ixudra\Validation\StringValidationTrait;
use Ixudra\Validation\TruthyValidationTrait;
use Ixudra\Validation\PasswordValidationTrait;
use Ixudra\Validation\TelephoneValidationTrait;
use Ixudra\Validation\CoordinateValidationTrait;

class YourAppNameValidator extends \Illuminate\Validation\Validator {

    use DateValidationTrait;
    use TimeValidationTrait;
    use FileValidationTrait;
    use JsonValidationTrait;
    use UserValidationTrait;
    use ArrayValidationTrait;
    use StringValidationTrait;
    use TruthyValidationTrait;
    use PasswordValidationTrait;
    use TelephoneValidationTrait;
    use CoordinateValidationTrait;


    protected $failures = array();


    protected function addFailure($attribute, $rule, $parameters)
    {
        $this->addError($attribute, $rule, $parameters);

        $this->failedRules[$attribute][$rule] = $parameters;
        $this->failures[] = strtolower( $attribute ) .'.'. lcfirst( $rule );
    }

    public function failures()
    {
        return $this->failures;
    }

}