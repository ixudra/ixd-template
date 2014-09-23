<?php


class AdminViewFactory extends BaseViewFactory {

    public function index()
    {
        return $this->makeView('bootstrap.admin.index');
    }

    public function reportBug($input = null)
    {
        if( is_null( $input ) ) {
            $input = array(
                'name'              => Auth::user()->present()->fullName,
                'email'             => Auth::user()->email,
                'page'              => '',
                'description'       => '',
                'expected'          => '',
                'actual'            => '',
                'info'              => ''
            );
        }

        $this->addParameter( 'input', $input );

        return $this->makeView('bootstrap.admin.reportBug');
    }

}