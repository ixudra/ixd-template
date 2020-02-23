<?php namespace App\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use App\Models\Role;

class RoleValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            'query'         => '',
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        return Role::getRules();
    }

}