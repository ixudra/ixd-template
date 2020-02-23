<?php namespace App\Http\Requests\Auth;


use Ixudra\Core\Http\Requests\BaseRequest;

class RegisterFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'first_name'                    => 'required|max:64',
            'last_name'                     => 'required|max:64',
            'email'                         => 'required|email|unique:users,email',
            'password'                      => 'required|max:64|validPassword',
            'password_confirm'              => 'required|max:64|same:password',
            'terms'                         => 'required|max:64|true',
        );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'terms' ] = $this->convertToTruthyValue( $input, 'terms' );

        return $input;
    }

    public function messages()
    {
        return array(
            'terms.true'        => 'Je moet de voorwaarden aanvaarden om te registreren',
        );
    }

}
