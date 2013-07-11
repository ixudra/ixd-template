<?php


class BaseViewFactory {

    protected $parameters = array(
        'messageType' => '',
        'messageValues' => array(),
    );

    public function notifyUser( $type, $messages )
    {
        $this->addParameter('messageType', $type);
        $this->addParameter('messageValues', $messages);
    }

    protected function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    protected function makeView( $view )
    {
        if( Auth::check() ) {
            $this->addParameter('activeUser', Auth::user());
        }

        return View::make( $view, $this->parameters );
    }
}

