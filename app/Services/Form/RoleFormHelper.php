<?php namespace App\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use App\Repositories\Eloquent\EloquentRoleRepository;

use App;

class RoleFormHelper extends BaseFormHelper {

    protected $repository;


    /**
     * @codeCoverageIgnore
     */
    public function __construct(EloquentRoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }


    /**
     * {@inheritDoc}
     */
    protected function getName($model)
    {
        return $model->present()->fullName;
    }

}
