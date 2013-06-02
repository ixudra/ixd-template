<?php


class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    protected function _convertToTruthyValue($input, $key)
    {
        if( array_key_exists ( $key, $input ) )
        {
            return true;
        }

        return false;
    }

}