<?php namespace App\Http\Controllers\Admin;


use Ixudra\Core\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Users\FilterUserFormRequest;
use App\Http\Requests\Admin\Users\CreateUserFormRequest;
use App\Http\Requests\Admin\Users\UpdateUserFormRequest;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\Html\Admin\UserViewFactory;
use App\Services\Factories\UserFactory;

use Auth;
use Translate;

class UserController extends BaseController {

    protected $userRepository;

    protected $userViewFactory;


    /**
     * @codeCoverageIgnore
     */
    public function __construct(EloquentUserRepository $userRepository, UserViewFactory $userViewFactory)
    {
        $this->userRepository = $userRepository;
        $this->userViewFactory = $userViewFactory;
    }


    public function index()
    {
        return $this->userViewFactory->index();
    }

    public function filter(FilterUserFormRequest $request)
    {
        return $this->userViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->userViewFactory->create();
    }

    public function store(CreateUserFormRequest $request, UserFactory $userFactory)
    {
        $user = $userFactory->make( $request->getInput() );

        return $this->redirect( 'admin.users.show', array('id' => $user->id), 'success', array( Translate::model( 'user.create.success' ) ) );
    }

    public function show($id)
    {
        $user = $this->userRepository->find( $id );
        if( is_null($user) ) {
            return $this->modelNotFound();
        }

        return $this->userViewFactory->show( $user );
    }

    public function edit($id)
    {
        $user = $this->userRepository->find( $id );
        if( is_null($user) ) {
            return $this->modelNotFound();
        }

        return $this->userViewFactory->edit( $user );
    }

    public function update($id, UpdateUserFormRequest $request, UserFactory $userFactory)
    {
        $user = $this->userRepository->find( $id );
        if( is_null($user) ) {
            return $this->modelNotFound();
        }

        $userFactory->modify( $user, $request->getInput() );

        return $this->redirect( 'admin.users.show', array('id' => $id), 'success', array( Translate::model( 'user.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find( $id );
        if( is_null($user) ) {
            return $this->modelNotFound();
        }

        $user->delete();

        return $this->redirect( 'admin.users.index', array(), 'success', array( Translate::model( 'user.delete.success' ) ) );
    }

    public function logInAsUser($id)
    {
        $user = $this->userRepository->find( $id );
        if( is_null($user) ) {
            return $this->modelNotFound();
        }

        Auth::loginUsingId( $id );

        return $this->redirect('admin.index');
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.users.index', array(), 'error', array( Translate::model( 'user.error.notFound' ) ) );
    }

}
