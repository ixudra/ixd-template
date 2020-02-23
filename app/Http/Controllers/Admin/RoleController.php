<?php namespace App\Http\Controllers\Admin;


use Ixudra\Core\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Roles\FilterRoleFormRequest;
use App\Http\Requests\Admin\Roles\CreateRoleFormRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleFormRequest;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Services\Html\Admin\RoleViewFactory;
use App\Services\Factories\RoleFactory;

use Translate;

class RoleController extends BaseController {

    protected $roleRepository;

    protected $roleViewFactory;


    /**
     * @codeCoverageIgnore
     */
    public function __construct(EloquentRoleRepository $roleRepository, RoleViewFactory $roleViewFactory)
    {
        $this->roleRepository = $roleRepository;
        $this->roleViewFactory = $roleViewFactory;
    }


    public function index()
    {
        return $this->roleViewFactory->index();
    }

    public function filter(FilterRoleFormRequest $request)
    {
        return $this->roleViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->roleViewFactory->create();
    }

    public function store(CreateRoleFormRequest $request, RoleFactory $roleFactory)
    {
        $role = $roleFactory->make( $request->getInput() );

        return $this->redirect( 'admin.roles.show', array('id' => $role->id), 'success', array( Translate::model( 'role.create.success' ) ) );
    }

    public function show($id)
    {
        $role = $this->roleRepository->find( $id );
        if( is_null($role) ) {
            return $this->modelNotFound();
        }

        return $this->roleViewFactory->show( $role );
    }

    public function edit($id)
    {
        $role = $this->roleRepository->find( $id );
        if( is_null($role) ) {
            return $this->modelNotFound();
        }

        return $this->roleViewFactory->edit( $role );
    }

    public function update($id, UpdateRoleFormRequest $request, RoleFactory $roleFactory)
    {
        $role = $this->roleRepository->find( $id );
        if( is_null($role) ) {
            return $this->modelNotFound();
        }

        $roleFactory->modify( $role, $request->getInput() );

        return $this->redirect( 'admin.roles.show', array('id' => $id), 'success', array( Translate::model( 'role.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $role = $this->roleRepository->find( $id );
        if( is_null($role) ) {
            return $this->modelNotFound();
        }

        $role->delete();

        return $this->redirect( 'admin.roles.index', array(), 'success', array( Translate::model( 'role.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.roles.index', array(), 'error', array( Translate::model( 'role.error.notFound' ) ) );
    }

}
