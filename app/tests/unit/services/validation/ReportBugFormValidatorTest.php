<?php


class ReportBugFormValidatorTest extends BaseUnitTestCase {

    protected $input = array(
        'name'           	=> 'John Doe',
        'email'             => 'john@doe.com',
        'page'              => 'Foo_page',
        'description'       => 'Foo_description',
        'expected'          => 'Foo_expected',
        'actual'            => 'Foo_actual',
        'info'              => 'Foo_info'
    );


    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses()
    {
        $validator = $this->createValidator();

        $this->assertTrue( $validator->passes() );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfNameIsNotProvided()
    {
        $this->input['name'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'name.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfEmailIsNotProvided()
    {
        $this->input['email'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'email.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfEmailIsNotValidEmailAddress()
    {
        $this->input['email'] = 'foo';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'email.email', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfPageIsNotProvided()
    {
        $this->input['page'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'page.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfDescriptionIsNotProvided()
    {
        $this->input['description'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'description.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfExpectedIsNotProvided()
    {
        $this->input['expected'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'expected.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_failsIfActualIsNotProvided()
    {
        $this->input['actual'] = '';
        $validator = $this->createValidator();

        $this->assertFalse( $validator->passes() );
        $this->assertCount(1, $validator->getFailures());
        $this->assertTrue( in_array( 'actual.required', $validator->getFailures() ) );
    }

    /**
     * @covers ReportBugFormValidator::passes()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testPasses_passesIfInfoIsNotProvided()
    {
        $this->input['info'] = '';
        $validator = $this->createValidator();

        $this->assertTrue( $validator->passes() );
    }

    /**
     * @covers ReportBugFormValidator::fails()
     * @covers BaseModelValidator::make()
     * @covers BaseModelValidator::getFailures()
     * @covers BaseModelValidator::setAttributes()
     */
    public function testFails()
    {
        $validator = $this->createValidator();

        $this->assertFalse( $validator->fails() );
    }

    protected function createValidator()
    {
        $validator = new ReportBugFormValidator();
        $validator->setAttributes($this->input);

        return $validator;
    }

}