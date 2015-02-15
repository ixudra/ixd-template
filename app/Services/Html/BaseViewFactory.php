<?php namespace App\Services\Html;


use \Auth;
use \View;
use \Translate;

class BaseViewFactory {

    protected $parameters = array(
        'messageType'       => '',
        'messageValues'     => array()
    );


    public function notifyUser($type, $messages, $translate = true)
    {
        if( $translate ) {
            $messages = $this->translateMessages($messages);
        }

        $this->addParameter('messageType', $type);
        $this->addParameter('messageValues', $messages);
    }

    protected function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    protected function makeView($view)
    {
        if( Auth::check() ) {
            $this->addParameter( 'activeUser', Auth::user() );
        }

        return View::make( $view, $this->parameters );
    }

    protected function translateMessages($messages)
    {
        $results = array();
        foreach( $messages as $message ) {
            array_push( $results, Translate::message($message) );
        }

        return $results;
    }

}

