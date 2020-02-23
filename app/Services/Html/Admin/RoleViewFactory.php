<?php namespace App\Services\Html\Admin;


use App\Models\Role;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Services\Input\RoleInputHelper;
use App\Services\Validation\RoleValidationHelper;

use App;

class RoleViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => '',
            );
        }

        return $this->prepareFilter( 'admin.roles.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make( RoleInputHelper::class )->getDefaultInput();
        }

        return $this->prepareForm( 'admin.roles.create', 'create', $input );
    }

    public function show(Role $role)
    {
        $this->addParameter( 'role', $role );

        return $this->makeView( 'admin.roles.show' );
    }

    public function edit(Role $role, $input = null)
    {
        if( $input == null ) {
            $input = App::make( RoleInputHelper::class )->getInputForModel( $role );
        }

        $this->addParameter( 'role', $role );

        return $this->prepareForm( 'admin.roles.edit', 'update', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( RoleInputHelper::class )->getInputForSearch( $input );
        $roles = App::make( EloquentRoleRepository::class )->search( $searchInput );

        $this->addParameter( 'roles', $roles );
        $this->addParameter( 'input', $input );

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $requiredFields = App::make( RoleValidationHelper::class )->getRequiredFormFields( $formName );

        $this->addParameter( 'input', $input );
        $this->addParameter( 'requiredFields', $requiredFields );

        return $this->makeView( $template );
    }

}
