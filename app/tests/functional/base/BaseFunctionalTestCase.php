<?php


class BaseFunctionalTestCase extends BaseUnitTestCase {

    protected function deleteModels()
    {
        $models = func_get_args();
        foreach( $models as $model ) {
            $model->delete();
        }
    }

    protected function truncateTables()
    {
        $tables = func_get_args();
        foreach( $tables as $table ) {
            DB::table($table)->delete();
        }
    }

}
