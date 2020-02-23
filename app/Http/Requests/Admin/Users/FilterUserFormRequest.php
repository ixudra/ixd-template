<?php namespace App\Http\Requests\Admin\Users;


use Ixudra\Core\Http\Requests\BaseRequest;
use App\Services\Validation\UserValidationHelper;

use App;

class FilterUserFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( UserValidationHelper::class )
            ->getFilterValidationRules();
    }

}
