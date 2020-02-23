<?php namespace App\Http\Controllers;


use Illuminate\Contracts\Auth\Guard;
use Ixudra\Core\Http\Controllers\BaseController;
use App\Http\Requests\Profile\UpdateProfileFormRequest;
use App\Services\Html\ProfileViewFactory;
use App\Services\Factories\UserFactory;

use Translate;

class ProfileController extends BaseController {

    protected $auth;

    protected $profileViewFactory;


    public function __construct(Guard $auth, ProfileViewFactory $profileViewFactory)
    {
        $this->auth = $auth;
        $this->profileViewFactory = $profileViewFactory;
    }


    public function show()
    {
        return $this->profileViewFactory->show( $this->auth->user() );
    }

    public function edit()
    {
        return $this->profileViewFactory->edit( $this->auth->user() );
    }

    public function update(UpdateProfileFormRequest $request, UserFactory $userFactory)
    {
        $userFactory->modify( $this->auth->user(), $request->getInput() );

        return $this->redirect( 'profile.show', array(), 'success', array( Translate::model( 'profile.edit.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'index', array(), 'error', array( Translate::model( 'user.error.notFound' ) ) );
    }
    
}
