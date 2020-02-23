<?php namespace App\Http\Requests\Auth;


use Ixudra\Core\Http\Requests\BaseRequest;

class LoginFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'email'                 => 'required|email|exists:users,email',
            'password'              => 'required',
            'remember'              => 'required|truthy',
        );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'remember' ] = $this->convertToTruthyValue( $input, 'remember' );

        return $input;
    }

}
