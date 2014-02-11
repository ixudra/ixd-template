<?php


class IxudraValidator extends Illuminate\Validation\Validator {

    public function validateTruthy($attribute, $value, $parameters)
    {
        if( $value === true ) {
            return true;
        }

        if( $value === false ) {
            return true;
        }

        return false;
    }

    public function validateTodayOrLater($attribute, $value, $parameters)
    {
        $date = null;
        try {
            $date = new DateTime($value);
        }
        catch(Exception $e) {
            return false;
        }

        return ( new DateTime( date('Y-m-d') ) ) <= ( $date );
    }

    public function validateFuture($attribute, $value, $parameters)
    {
        $date = $this->_getValueAsDate($value);

        return ( ( $date != null ) && ( (new DateTime()) < ($date) ) );
    }

    public function validatePast($attribute, $value, $parameters)
    {
        $date = $this->_getValueAsDate($value);

        return ( ( $date != null ) && ( (new DateTime()) > ($date) ) );
    }

    protected function _getValueAsDate($value)
    {
        $date = null;

        try {
            $date = new DateTime($value);
        } catch (Exception $e) {

        }

        return $date;
    }

    public function validateEmpty($attribute, $value, $parameters)
    {
        return ( $value == '' );
    }

    public function validateTime($attribute, $value, $parameters)
    {
        if( strtotime( $value ) !== false )
            return true;

        return false;
    }

    public function validateTimeFormat($attribute, $value, $parameters)
    {
        if (preg_match("/^(2[0-3]|[01]?[1-9]):([0-5]?[0-9])$/", $value)) {
            return true;
        }

        return false;
    }

    public function validateValidPassword($attribute, $value, $parameters)
    {
        if( strlen($value) < 6 ) {
            return false;
        }

        if( preg_match('/\d/', $value) != 1 ) {
            return false;
        }

        if( preg_match('/[A-Z]/', $value) != 1 ) {
            return false;
        }

        if( preg_match('/[@#&?.-_%$]/', $value) != 1 ) {
            return false;
        }

        return true;
    }

    public function validateLessThanThreeDaysOld($attribute, $value, $parameters)
    {
        $date = $this->_getValueAsDate($value);

        return ( ( $date != null ) && ( (new DateTime( date('Y-m-d H:i:s', strtotime('-3 days')) )) < ($date) ) );
    }

    public function validateTrue($attribute, $value, $parameters)
    {
        return $value === true;
    }

    public function validateOneOrMoreSelected($attribute, $value, $parameters)
    {
        if( !is_array( $value ) )
            return false;

        $count = 0;
        foreach( $value as $item ) {
            if( $item ) {
                ++$count;
            }
        }

        return $count > 0;
    }

    public function validateArraySize($attribute, $value, $parameters)
    {
        if( !is_array( $value ) )
            return false;

        return sizeof($value) == $parameters[0];
    }

}
