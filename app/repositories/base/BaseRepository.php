<?php


abstract class BaseRepository {

    public function all()
    {
        return $this->getModel()->all();
    }

    public function find($id)
    {
        return $this->getModel()->find($id);
    }

    public function findByFilter($filters)
    {
        $results = $this->getModel();
        $results = $this->applyFilters( $results, $filters );

        return $results->get();
    }

    public function search($filters, $resultsPerPage)
    {
        $results = $this->getModel();

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

    abstract protected function getModel();

    abstract protected function getTable();

    protected function applyFilters($query, $filters = array())
    {
        foreach( $this->preProcessFilters($filters) as $key => $value ) {
            if( $value == '' ) {
                continue;
            }

            $query = $query->where($key, '=', $value);
        }

        return $query;
    }

    protected function preProcessFilters($filters)
    {
        foreach( $filters as $key => $value ) {
            if( $value === true ) {
                $filters[$key] = '1';
                continue;
            }

            if( $value === false ) {
                $filters[$key] = '0';
                continue;
            }
        }

        return $filters;
    }

}
