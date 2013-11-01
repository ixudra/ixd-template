<?php


class BaseTestCase extends Illuminate\Foundation\Testing\TestCase {

	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__ . '/../../../bootstrap/start.php';
	}

    protected function _deleteModels()
    {
        $models = func_get_args();
        foreach($models as $model) {
            $model->delete();
        }
    }

    protected function _truncateTables()
    {
        $tables = func_get_args();
        foreach($tables as $table) {
            DB::table($table)->delete();
        }
    }

}
