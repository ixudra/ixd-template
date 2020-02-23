<?php namespace App\Http\Requests\Auth;


use Ixudra\Core\Http\Requests\BaseRequest;

class ChangeEmailFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'email_old'             => 'required|email|exists:users,email|emailBelongsToAuthenticatedUser',
            'email_new'             => 'required|email|different:email_old|unique:users,email',
            'email_confirm'         => 'required|same:email_new',
            'password'              => 'required|correctPassword',
        );
    }

}
