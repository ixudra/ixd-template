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
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateEmailAddress(null, 'jan.oris@gmail.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoAt()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.orisixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsMoreThanOneAt()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan@oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoLocal()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, '@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoTLD()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfValueContainsNoDomain()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfDomainDoesNotExist()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfLocalContainsTwoConsecutiveDots()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan..oris@ixudra.com', null) );
    }

    /**
     * @covers IxudraValidator::validateEmailAddress()
     */
    public function testValidateEmailAddress_returnsFalseIfDomainContainsTwoConsecutiveDots()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmailAddress(null, 'jan.oris@ixudra..com', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateWebAddress(null, 'www.google.be', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfWebAddressDoesNotContainTLD()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfWebAddressDoesNotContainWww()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'elimentz.be', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfDomainDoesNotExist()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz.com', null) );
    }

    /**
     * @covers IxudraValidator::validateWebAddress()
     */
    public function testValidateWebAddress_returnsFalseIfDomainContainsTwoConsecutiveDots()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateWebAddress(null, 'www.elimentz..be', null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsTrueIfValueIsTrue()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTruthy(null, true, null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsTrueIfValueIsFalse()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTruthy(null, false, null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsFalseIfValueIsText()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTruthy(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTruthy()
     */
    public function testValidateTruthy_returnsFalseIfValueIsNumeric()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTruthy(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateFuture(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsInThePast()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsText()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsInteger()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validatePast(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsInTheFuture()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsText()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validatePast()
     */
    public function testValidatePast_returnsFalseIfValueIsInteger()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validatePast(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d', strtotime('+1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsFalseIfValueIsInThePast()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTodayOrLater(null, date('Y-m-d', strtotime('-1 year')), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsTrueIfDateIsToday()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d'), null) );
    }

    /**
     * @covers IxudraValidator::validateTodayOrLater()
     */
    public function testValidateTodayOrLater_returnsTrueIfDateIsTodayWithLargeFormat()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTodayOrLater(null, date('Y-m-d H:i:s'), null) );
    }

    /**
     * @covers IxudraValidator::validateFuture()
     */
    public function testValidateFuture_returnsFalseIfValueIsNumeric()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateFuture(null, 1, null) );
    }

    /**
     * @covers IxudraValidator::validateEmpty()
     */
    public function testValidateEmpty()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateEmpty(null, '', null) );
    }

    /**
     * @covers IxudraValidator::validateEmpty()
     */
    public function testValidateEmpty_failsIfValueIsNotEmpty()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateEmpty(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTime(null, '19:00:00', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_passesOnShortNotation()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTime(null, '19:00', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_FailsIfValueIsString()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTime(null, 'foo', null) );
    }

    /**
     * @covers IxudraValidator::validateTime()
     */
    public function testValidateTime_FailsIfValueIsInteger()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTime(null, '10055223366', null) );
    }

    /**
     * @covers IxudraValidator::validateTimeFormat()
     */
    public function testValidateTimeFormat()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertTrue( self::$validator->validateTimeFormat(null, '15:00', null) );
    }

    /**
     * @covers IxudraValidator::validateTimeFormat()
     */
    public function testValidateTimeFormat_failsIfFormatShowsSeconds()
    {
        $this->makeValidator( array(), array(), array() );

        $this->assertFalse( self::$validator->validateTimeFormat(null, '15:00:00', null) );
    }


    protected function makeValidator( $attributes, $rules, $messages )
    {
        self::$validator = Validator::make( $attributes, $rules, $messages );
    }

}
