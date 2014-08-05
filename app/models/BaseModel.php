<?php


abstract class BaseModel extends Eloquent {

    protected $translationKey = '';

    protected $validated = false;

    protected $validators = array(
        'testing'       => 'TestingValidator',
        'default'       => 'BaseModelValidator'
    );


    public function make($input)
    {
        $response = new BaseModelResponse($this, $input);

        $validator = App::make( $this->getValidator() );
        $validator->setAttributes($input);
        if( $validator->fails() ) {
            $response->addNotifications('error', $validator->getErrors());

            return $response;
        }

        $this->fill( $input );
        $this->validated = true;

        $response->addNotifications('success', array($this->translationKey .'.create.success'), true);

        return $response;
    }

    public function modify($input)
    {
        $response = new BaseModelResponse($this, $input);

        $validator = App::make( $this->getValidator() );
        $validator->setAttributes($input);
        if( $validator->fails() ) {
            $response->addNotifications('error', $validator->getErrors());

            return $response;
        }

        $this->fill( $input );
        $this->validated = true;

        $response->addNotifications('success', array($this->translationKey .'.edit.success'), true);

        return $response;
    }

    public function remove()
    {
        $this->delete();

        $response = new BaseModelResponse();
        $response->addNotifications('success', array($this->translationKey .'.delete.success'), true);

        return $response;
    }

    public function isValid($validationKey = 'default')
    {
        $validator = App::make( $this->getValidator( $validationKey ) );
        $input = $this->attributesToArray();

        $validator->setAttributes( $input );
        if( $validator->fails() ) {
            return false;
        }

        return true;
    }

    public function save(array $options = array())
    {
        $validator = 'default';
        if( array_key_exists( 'validator', $options ) ) {
            $validator = $options['validator'];
        }

        if( $this->validated || $this->isValid( $validator ) ) {
            return parent::save($options);
        }

        return false;
    }

    public function forceSave(array $options = array())
    {
        return $this->save( array( 'validator' => 'testing' ) );
    }

    public function isValidated()
    {
        return $this->validated;
    }


    public static function getDefaults() { return array(); }

    protected function getValidator($validationKey = 'default')
    {
        if( !array_key_exists( $validationKey, $this->validators ) ) {
            $validationKey = 'default';
        }

        return $this->validators[ $validationKey ];
    }

}
