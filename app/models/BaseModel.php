<?php


abstract class BaseModel extends Eloquent {

    protected $validated = false;

    protected $validators = array(
        'testing'       => 'TestingValidator',
        'default'       => 'BaseModelValidator'
    );


    public function isValidated() {
        return $this->validated;
    }


    public abstract function make($input);

    public abstract function modify($input);

    public abstract function remove();

    public abstract function isValid($validator = 'default');

    public function save(array $options = array())
    {
        $validator = 'default';
        if( array_key_exists( 'validator', $options ) ) {
            $validator = $options['validator'];
        }

        if( $this->validated || $this->isValid($validator) ) {
            return parent::save($options);
        }

        return false;
    }


    public static function getDefaults() { return array(); }

    protected function getValidator($validationKey = 'default')
    {
        if( !array_key_exists( $validationKey, $this->validators ) ) {
            $validationKey = 'default';
        }

        return $this->validators[ $validationKey ];
    }

    protected function _convertToTruthyValue($input, $key)
    {
        if( !array_key_exists( $key, $input ) ) {
            return false;
        }

        if( $input[ $key ] == 0 ) {
            return false;
        }

        return true;
    }

    protected function _convertToArray($input, $key)
    {
        if( array_key_exists( $key, $input ) ) {
            return $input[$key];
        }

        return array();
    }

}
