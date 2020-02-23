<?php namespace App\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use App\Repositories\Eloquent\EloquentUserRepository;

use App;

class UserFormHelper extends BaseFormHelper {

    protected $repository;


    /**
     * @codeCoverageIgnore
     */
    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }


    /**
     * {@inheritDoc}
     */
    protected function getName($model)
    {
        return $model->present()->fullName;
    }

    public function getActiveOptionsAsSelectList($includeNull = false)
    {
        return $this->getBooleanSelectList( $includeNull );
    }

}
