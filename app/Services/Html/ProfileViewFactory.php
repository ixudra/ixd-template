<?php namespace App\Services\Html;


use App\Models\User;
use App\Services\Input\UserInputHelper;
use App\Services\Validation\UserValidationHelper;
use App\Services\Html\Admin\BaseViewFactory;

use App;

class ProfileViewFactory extends BaseViewFactory {

    public function show(User $user)
    {
        $this->addParameter( 'user', $user );

        return $this->makeView( 'profile.show' );
    }

    public function edit(User $user)
    {
        $input = App::make(UserInputHelper::class)->getInputForModel( $user );

        $this->addParameter( 'user', $user );

        return $this->prepareForm( 'profile.edit', 'update', $input );
    }


    protected function prepareForm($template, $formName, $input)
    {
        $requiredFields = App::make(UserValidationHelper::class)->getRequiredFormFields( $formName );

        $this->addParameter( 'input', $input );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView( $template );
    }

}
