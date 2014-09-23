<?php


class ReportBugFormValidator extends BaseModelValidator {
    
    protected $rules = array (
        'name'              => 'required',
        'email'             => 'required|email',
        'page'              => 'required',
        'description'       => 'required',
        'expected'          => 'required',
        'actual'            => 'required',
        'info'              => ''
    );

    protected $messages = array(
        // ...
    );

}