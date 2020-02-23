<?php namespace App\Http\Requests\Auth;


use Ixudra\Core\Http\Requests\BaseRequest;

class ChangePasswordFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'password_old'          => 'required|correctPassword',
            'password_new'          => 'required|different:password_old|validPassword',
            'password_confirm'      => 'required|same:password_new',
        );
    }

}
