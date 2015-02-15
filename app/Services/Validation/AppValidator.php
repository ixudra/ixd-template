<?php namespace App\Services\Validation;


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

class AppValidator extends \Illuminate\Validation\Validator {

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

    use AppValidationTrait;

}