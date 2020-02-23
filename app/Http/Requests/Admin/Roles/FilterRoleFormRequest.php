<?php namespace App\Http\Requests\Admin\Roles;


use Ixudra\Core\Http\Requests\BaseRequest;
use App\Services\Validation\RoleValidationHelper;

use App;

class FilterRoleFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( RoleValidationHelper::class )
            ->getFilterValidationRules();
    }

}
