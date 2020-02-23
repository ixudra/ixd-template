<?php namespace App\Services\Input;


use App\Repositories\Eloquent\EloquentRoleRepository;
use Ixudra\Core\Services\Input\BaseInputHelper;
use App\Models\User;

class UserInputHelper extends BaseInputHelper {

    protected $roleRepository;


    /**
     * @codeCoverageIgnore
     */
    public function __construct(EloquentRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }


    /**
     * {@inheritDoc}
     */
    public function getDefaultInput($prefix = '')
    {
        $input = $this->getPrefixedInput( User::getDefaults(), $prefix );
        $input[ 'role_id' ] = $this->roleRepository->findByKey( 'technician' )->id;

        return $input;
    }

    /**
     * {@inheritDoc}
     */
    public function getInputForModel($model, $prefix = '')
    {
        $input = parent::getInputForModel( $model );
        $input[ 'role_id' ] = $model->roles->first()->id;

        return $this->getPrefixedInput( $input, $prefix );
    }

    /**
     * {@inheritDoc}
     */
    public function getInputForSearch($input)
    {
        if( array_key_exists('query', $input) && !empty($input[ 'query' ]) ) {
            $input[ 'query' ] = '%'. $input[ 'query' ] .'%';
        }

        return parent::getInputForSearch( $input );
    }

}
