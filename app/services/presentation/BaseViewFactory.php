<?php


use \Robbo\Presenter\PresentableInterface;

class BaseViewFactory {

    protected $parameters = array(
        'messageType'       => '',
        'messageValues'     => array()
    );


    public function notifyUser($type, $messages)
    {
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

    protected function convertObjectsToPresenters($objects)
    {
        $results = array();
        foreach( $objects as $key => $object ) {
            $results[$key] = $this->convertObjectToPresenter($object);
        }

        return $results;
    }

    protected function convertObjectToPresenter($object)
    {
        if( $object instanceof PresentableInterface ) {
            return $object->getPresenter();
        }

        return $object;
    }

    protected function isCollection($value)
    {
        return is_array($value) || ($value instanceof \Illuminate\Support\Collection);
    }

}

