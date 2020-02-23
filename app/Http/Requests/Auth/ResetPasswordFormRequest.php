<?php namespace App\Http\Requests\Auth;


use Ixudra\Core\Http\Requests\BaseRequest;

class ResetPasswordFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'email'             =>  'required|email|exists:users,email',
        );
    }

}
