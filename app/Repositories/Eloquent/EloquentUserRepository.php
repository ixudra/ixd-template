<?php namespace App\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use App\Models\User;

class EloquentUserRepository extends BaseEloquentRepository {

    /**
     * {@inheritDoc}
     */
    protected function getModel()
    {
        return new User;
    }

    /**
     * {@inheritDoc}
     */
    protected function getTable()
    {
        return 'users';
    }

    /**
     * {@inheritDoc}
     */
    public function search($filters, $size = 25)
    {
        $results = $this->getModel();
        $results = $this->applyBoolean( $results, array('active'), $filters );

        if( array_key_exists('query', $filters) && !empty($filters[ 'query' ]) ) {
            $results = $results
                ->where('first_name', 'like', $filters[ 'query' ])
                ->orWhere('last_name', 'like', $filters[ 'query' ]);
        }

        return $this->paginated( $results, $filters, $size );
    }

    /**
     * {@inheritDoc}
     */
    protected function paginated($results, $filters = array(), $size = 25)
    {
        return $results
            ->select($this->getTable() .'.*')
            ->orderBy('last_name', 'asc')
            ->paginate($size)
            ->appends($filters)
            ->appends('size', $size);
    }

}
