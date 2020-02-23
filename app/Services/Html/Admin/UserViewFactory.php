<?php namespace App\Services\Html\Admin;


use App\Models\User;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\Form\RoleFormHelper;
use App\Services\Form\UserFormHelper;
use App\Services\Input\UserInputHelper;
use App\Services\Validation\UserValidationHelper;

use App;

class UserViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => '',
                'active'        => true,
            );
        }

        return $this->prepareFilter( 'admin.users.index', $input );
    }

    public function create($input = null)
    {
        if( $input === null ) {
            $input = App::make( UserInputHelper::class )->getDefaultInput();
        }

        return $this->prepareForm( 'admin.users.create', 'create', $input );
    }

    public function show(User $user)
    {
        $this->addParameter( 'user', $user );

        return $this->makeView( 'admin.users.show' );
    }

    public function edit(User $user, $input = null)
    {
        if( $input === null ) {
            $input = App::make( UserInputHelper::class )->getInputForModel( $user );
        }

        $this->addParameter( 'user', $user );

        return $this->prepareForm( 'admin.users.edit', 'update', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( UserInputHelper::class )->getInputForSearch( $input );
        $activeOptions = App::make( UserFormHelper::class )->getActiveOptionsAsSelectList( true );
        $users = App::make( EloquentUserRepository::class )->search( $searchInput );

        $this->addParameter( 'users', $users );
        $this->addParameter( 'activeOptions', $activeOptions );
        $this->addParameter( 'input', $input );

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $roles = App::make( RoleFormHelper::class )->getAllAsSelectList();

        $requiredFields = App::make( UserValidationHelper::class )->getRequiredFormFields( $formName );

        $this->addParameter( 'input', $input );
        $this->addParameter( 'roles', $roles );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView( $template );
    }

}
