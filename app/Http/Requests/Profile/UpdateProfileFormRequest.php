<?php namespace App\Http\Requests\Profile;


use Ixudra\Core\Http\Requests\BaseRequest;
use App\Services\Validation\UserValidationHelper;

use App;

class UpdateProfileFormRequest extends BaseRequest {

    /**
     * @codeCoverageIgnore
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( UserValidationHelper::class )
            ->getFormValidationRules( 'profile' );
    }

}
