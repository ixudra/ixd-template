<?php


class IxudraValidator extends Illuminate\Validation\Validator {

    public function validateEmailAddress($attribute, $value, $parameters)
    {
        $isValid = true;
        $atIndex = strrpos($value, "@");

        if (is_bool($atIndex) && !$atIndex)
        {
            $isValid = false;
        }
        else
        {
            $domain = substr($value, $atIndex + 1);
            $local = substr($value, 0, $atIndex);
            $localLen = strlen($local);
            $domainLen = strlen($domain);

            if ($localLen < 1 || $localLen > 64)
            {
                // local part length exceeded
                $isValid = false;
            }
            else if ($domainLen < 1 || $domainLen > 255)
            {
                // domain part length exceeded
                $isValid = false;
            }
            else if ($local[0] == '.' || $local[$localLen - 1] == '.')
            {
                // local part starts or ends with '.'
                $isValid = false;
            }
            else if (preg_match('/\\.\\./', $local))
            {
                // local part has two consecutive dots
                $isValid = false;
            }
            else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
            {
                // character not valid in domain part
                $isValid = false;
            }
            else if (preg_match('/\\.\\./', $domain))
            {
                // domain part has two consecutive dots
                $isValid = false;
            }
            else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local)))
            {
                // character not valid in local part unless
                // local part is quoted
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local)))
                {
                    $isValid = false;
                }
            }

            if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A")))
            {
                // domain not found in DNS
                $isValid = false;
            }
        }

        return $isValid;
    }

    public function validateWebAddress($attribute, $value, $parameters)
    {
        $isValid = true;
        $www = substr($value, 0, 4);
        $domain = substr($value, 5);
        $domainLen = strlen($domain);

        if( $www != 'www.' )
        {
            $isValid = false;
        }
        else if ($domainLen < 1 || $domainLen > 255)
        {
            // domain part length exceeded
            $isValid = false;
        }
        else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
        {
            // character not valid in domain part
            $isValid = false;
        }
        else if (preg_match('/\\.\\./', $domain))
        {
            // domain part has two consecutive dots
            $isValid = false;
        }

        if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A")))
        {
            // domain not found in DNS
            $isValid = false;
        }

        return $isValid;
    }

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
