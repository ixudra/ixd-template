<?php namespace App\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use App\Models\Role;

class RoleFactory extends BaseFactory {

    public function make($input, $prefix = '')
    {
        return Role::create( $this->extractInput( $input, Role::getDefaults(), $prefix, true ) );
    }

    public function modify($role, $input, $prefix = '')
    {
        return $role->update( $this->extractInput( $input, Role::getDefaults(), $prefix ) );
    }

}