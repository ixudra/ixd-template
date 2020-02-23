<?php namespace App\Http\Requests\Admin\Users;


use Ixudra\Core\Http\Requests\BaseRequest;
use App\Services\Validation\UserValidationHelper;

use App;

class CreateUserFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( UserValidationHelper::class )
            ->getFormValidationRules( 'create' );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'active' ] = $this->convertToTruthyValue( $input, 'active' );

        return $input;
    }

}
