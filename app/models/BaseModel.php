<?php


abstract class BaseModel extends Eloquent {

    protected $validated = false;

    protected $validators = array(
        'testing'       => 'TestingValidator',
        'default'       => 'BaseModelValidator'
    );


    public function isValidated()
    {
        return $this->validated;
    }


    public abstract function make($input);

    public abstract function modify($input);

    public abstract function remove();

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
