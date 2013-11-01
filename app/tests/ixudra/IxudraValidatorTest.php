<?php


class IxudraValidatorTest extends BaseTestCase {

    protected static $validator;

    public static function setUpBeforeClass()
    {
        self::$validator = null;
    }

    public static function tearDownAfterClass()
    {
        self::$validator = null;
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateEmailAddress(null, 'jan.oris@gmail.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoAt()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.orisixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsMoreThanOneAt()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan@oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoLocal()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, '@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoTLD()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoDomain()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfDomainDoesNotExist()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfLocalContainsTwoConsecutiveDots()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan..oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfDomainContainsTwoConsecutiveDots()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra..com', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateWebAddress(null, 'www.google.be', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfWebAddressDoesNotContainTLD()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfWebAddressDoesNotContainWww()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'elimentz.be', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfDomainDoesNotExist()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz.com', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfDomainContainsTwoConsecutiveDots()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz..be', null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsTrueIfValueIsTrue()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTruthy(null, true, null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsTrueIfValueIsFalse()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTruthy(null, false, null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsFalseIfValueIsText()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTruthy(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsFalseIfValueIsNumeric()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTruthy(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateFuture(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsInThePast()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsText()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsInteger()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validatePast(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsInTheFuture()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsText()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsInteger()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsFalseIfValueIsInThePast()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTodayOrLater(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsTrueIfDateIsToday()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d'), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsTrueIfDateIsTodayWithLargeFormat()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d H:i:s'), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsNumeric()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateEmpty()
     */
    public function testValidateEmpty()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateEmpty(null, '', null) );
    }

    /**
     * @covers IxudraValidator::validateEmpty()
     */
    public function testValidateEmpty_failsIfValueIsNotEmpty()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmpty(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTime(null, '19:00:00', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_passesOnShortNotation()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTime(null, '19:00', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_FailsIfValueIsString()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTime(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_FailsIfValueIsInteger()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTime(null, '10055223366', null) );
    }

    /**
     * @covers IxudraValidator::validateValidPassword()
     */
    public function testValidatePassword()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateValidPassword(null, 'Abc@123', null) );
    }

    /**
     * @covers IxudraValidator::validateValidPassword()
     */
    public function testValidatePassword_failsIfPasswordIsLessThanSixCharactersLong()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateValidPassword(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateValidPassword()
     */
    public function testValidatePassword_failsIfPasswordDoesNotContainCapitalLetter()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateValidPassword(null, 'abc@123', null) );
    }

    /**
     * @covers IxudraValidator::validateValidPassword()
     */
    public function testValidatePassword_failsIfPasswordDoesNotContainSpecialCharacter()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateValidPassword(null, 'abcd123', null) );
    }

    /**
     * @covers IxudraValidator::validateValidPassword()
     */
    public function testValidatePassword_failsIfPasswordDoesNotContainNumber()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateValidPassword(null, 'abcd123', null) );
    }

    /**
     * @covers IxudraValidator::validateTrue()
     */
    public function testValidateTrue()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTrue(null, true, null) );
    }

    /**
     * @covers IxudraValidator::validateTrue()
     */
    public function testValidateTrue_returnsFalseIfValueIsFalse()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTrue(null, false, null) );
    }

    /**
     * @covers IxudraValidator::validateTrue()
     */
    public function testValidateTrue_returnsFalseIfValueIsString()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTrue(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTrue()
     */
    public function testValidateTrue_returnsFalseIfValueIsInteger()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTrue(null, 125, null) );
    }

    /**
     * @covers IxudraValidator::validateLessThanThreeDaysOld()
     */
    public function testValidateLessThanThreeDaysOld()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateLessThanThreeDaysOld(null, date('Y-m-d', strtotime('-1 day')), null) );
    }

    /**
     * @covers IxudraValidator::validateLessThanThreeDaysOld()
     */
    public function testValidateLessThanThreeDaysOld_failsIfDateIsMoreThanThreeDaysOld()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateLessThanThreeDaysOld(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateOneOrMoreSelected()
     */
    public function testValidateOneOrMoreSelected()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateOneOrMoreSelected(null, array(1 => true, 4 => false), null) );
    }

    /**
     * @covers IxudraValidator::validateOneOrMoreSelected()
     */
    public function testValidateOneOrMoreSelected_returnsFalseIfZeroSelected()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateOneOrMoreSelected(null, array(1 => false, 4 => false), null) );
    }

    /**
     * @covers IxudraValidator::validateOneOrMoreSelected()
     */
    public function testValidateOneOrMoreSelected_returnsFalseIfValueIsNotArray()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateOneOrMoreSelected(null, 'Foo', null) );
    }

    /**
     * @covers IxudraValidator::validateOneOrMoreSelected()
     */
    public function testValidateOneOrMoreSelected_returnsFalseIfArrayIsEmpty()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateOneOrMoreSelected(null, array(), null) );
    }

    /**
     * @covers IxudraValidator::validateArraySize()
     */
    public function testValidateArraySize()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateArraySize(null, array('one', 'two', 'three', 'four', 'five'), array(5)) );
    }

    /**
     * @covers IxudraValidator::validateArraySize()
     */
    public function testValidateArraySize_retunsFalseValueIsNotArray()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateArraySize(null, 'Foo', array(5)) );
    }

    /**
     * @covers IxudraValidator::validateArraySize()
     */
    public function testValidateArraySize_retunsFalseIfArrayContainsLessThanRequestedNumber()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateArraySize(null, array('one', 'two', 'three', 'four', 'five'), array(10)) );
    }

    /**
     * @covers IxudraValidator::validateArraySize()
     */
    public function testValidateArraySize_retunsFalseIfArrayContainsMoreThanRequestedNumber()
    {
        $this->_makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateArraySize(null, array('one', 'two', 'three', 'four', 'five'), array(2)) );
    }


    protected function _makeValidator( $attributes, $rules, $messages )
    {
        self::$validator = Validator::make( $attributes, $rules, $messages );
    }

}
