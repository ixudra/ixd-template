<?php namespace App\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use App\Models\Role;

class EloquentRoleRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new Role;
    }

    protected function getTable()
    {
        return 'roles';
    }

    public function getRoleForUser($userId, $key)
    {
        return $this->getModel()
            ->join('user_roles', 'user_roles.role_id', '=', 'roles.id')
            ->where('user_roles.user_id', '=', $userId)
            ->where('roles.key', '=', $key)
            ->select('roles.*')
            ->first();
    }

    public function findByKey($key)
    {
        return $this->getModel()
            ->where('key', '=', $key)
            ->first();
    }

    public function search($filters, $size = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] !== '' ) {
            $results = $results
                ->where('key', 'like', $filters[ 'query' ]);
        }

        return $this->paginated( $results, $filters, $size );
    }

}
