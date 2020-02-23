<?php namespace App\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use App\Models\User;

class UserValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            'query'         => '',
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        $userRules = User::getRules();
        if( $formName === 'profile' || $formName === 'update' ) {
            unset( $userRules[ 'email' ] );
            unset( $userRules[ 'password' ] );
        }

        return $userRules;
    }

}
