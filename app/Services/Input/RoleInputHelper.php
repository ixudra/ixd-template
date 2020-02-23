<?php namespace App\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use App\Models\Role;

class RoleInputHelper extends BaseInputHelper {

    public function getDefaultInput($prefix = '')
    {
        return $this->getPrefixedInput( Role::getDefaults(), $prefix );
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
