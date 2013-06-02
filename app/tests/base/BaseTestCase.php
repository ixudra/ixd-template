<?php


class BaseTestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__ . '/../../../bootstrap/start.php';
	}

    protected function _deleteModels()
    {
        $models = func_get_args();
        foreach($models as $model)
        {
            $model->delete();
        }
    }

}
