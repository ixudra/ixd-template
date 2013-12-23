<?php


use \Robbo\Presenter\PresentableInterface;

class BaseViewFactory {

    protected $parameters = array(
        'messageType'       => '',
        'messageValues'     => array()
    );

    public function notifyUser($type, $messages)
    {
        $this->_addParameter('messageType', $type);
        $this->_addParameter('messageValues', $messages);
    }

    protected function _addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    protected function _makeView($view)
    {
        if( Auth::check() ) {
            $this->_addParameter( 'activeUser', Auth::user() );
        }

        return View::make( $view, $this->parameters );
    }

    protected function _convertObjectsToPresenters($objects)
    {
        $results = array();
        foreach( $objects as $key => $object ) {
            $results[$key] = $this->_convertObjectToPresenter($object);
        }

        return $results;
    }

    protected function _convertObjectToPresenter($object)
    {
        if( $object instanceof PresentableInterface ) {
            return $object->getPresenter();
        }

        return $object;
    }

    protected function _isCollection($value)
    {
        return is_array($value) || ($value instanceof \Illuminate\Support\Collection);
    }

}

