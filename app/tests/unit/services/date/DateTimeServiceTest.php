<?php


class DateTimeServiceTest extends BaseTestCase {

    protected $dateTimeService;


    public function setUp()
    {
        parent::setUp();

        $this->dateTimeService = new DateTimeService();
    }


    /**
     * @covers DateTimeService::getWeekOFDate()
     */
    public function testGetWeekOfDate()
    {
        $index = $this->dateTimeService->getWeekOfDate('2013-01-31');

        $this->assertEquals( 5, $index );
    }

    /**
     * @covers DateTimeService::getWeekOfDate()
     */
    public function testGetWeekOfDate_returnsFirstWeekIfDateFallsInFirstWeek()
    {
        $index = $this->dateTimeService->getWeekOfDate('2013-01-05');

        $this->assertEquals( 1, $index );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek()
    {
        $days = $this->dateTimeService->getDaysOfWeek(4, 2013);

        $this->assertCount( 7, $days );
        $this->assertEquals( '2013-01-21', $days['monday'] );
        $this->assertEquals( '2013-01-22', $days['tuesday'] );
        $this->assertEquals( '2013-01-23', $days['wednesday'] );
        $this->assertEquals( '2013-01-24', $days['thursday'] );
        $this->assertEquals( '2013-01-25', $days['friday'] );
        $this->assertEquals( '2013-01-26', $days['saturday'] );
        $this->assertEquals( '2013-01-27', $days['sunday'] );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek_showsLastWeekOfAugust()
    {
        $days = $this->dateTimeService->getDaysOfWeek(35, 2013);

        $this->assertCount( 7, $days );
        $this->assertEquals( '2013-08-26', $days['monday'] );
        $this->assertEquals( '2013-08-27', $days['tuesday'] );
        $this->assertEquals( '2013-08-28', $days['wednesday'] );
        $this->assertEquals( '2013-08-29', $days['thursday'] );
        $this->assertEquals( '2013-08-30', $days['friday'] );
        $this->assertEquals( '2013-08-31', $days['saturday'] );
        $this->assertEquals( '2013-09-01', $days['sunday'] );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek_showsLastWeekOfYearCorrectly()
    {
        $days = $this->dateTimeService->getDaysOfWeek(52, 2013);

        $this->assertCount( 7, $days );
        $this->assertEquals( '2013-12-23', $days['monday'] );
        $this->assertEquals( '2013-12-24', $days['tuesday'] );
        $this->assertEquals( '2013-12-25', $days['wednesday'] );
        $this->assertEquals( '2013-12-26', $days['thursday'] );
        $this->assertEquals( '2013-12-27', $days['friday'] );
        $this->assertEquals( '2013-12-28', $days['saturday'] );
        $this->assertEquals( '2013-12-29', $days['sunday'] );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek_movesOnToNextYearIfWeekIsLargerThanFiftyTwo()
    {
        $days = $this->dateTimeService->getDaysOfWeek(55, 2013);

        $this->assertCount( 7, $days );
        $this->assertEquals( '2014-01-13', $days['monday'] );
        $this->assertEquals( '2014-01-14', $days['tuesday'] );
        $this->assertEquals( '2014-01-15', $days['wednesday'] );
        $this->assertEquals( '2014-01-16', $days['thursday'] );
        $this->assertEquals( '2014-01-17', $days['friday'] );
        $this->assertEquals( '2014-01-18', $days['saturday'] );
        $this->assertEquals( '2014-01-19', $days['sunday'] );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek_returnsNullIfIndexIsSmallerThanOne()
    {
        $days = $this->dateTimeService->getDaysOfWeek(-4, 2013);

        $this->assertNull( $days );
    }

    /**
     * @covers DateTimeService::getDaysOfWeek()
     */
    public function testGetDaysOfWeek_returnsNullIfYearIsSmallerThanOne()
    {
        $days = $this->dateTimeService->getDaysOfWeek(4, -2013);

        $this->assertNull( $days );
    }

    /**
     * @covers DateTimeService::getLastMondayBeforeDate()
     */
    public function testGetLastMondayBeforeDate()
    {
        $date = $this->dateTimeService->getLastMondayBeforeDate('2013-05-25');

        $this->assertEquals( '2013-05-20', $date );
    }

    /**
     * @covers DateTimeService::getLastMondayBeforeDate()
     */
    public function testGetLastMondayBeforeDate_returnsSameDateIfGivenDateIsMonday()
    {
        $date = $this->dateTimeService->getLastMondayBeforeDate('2013-05-20');

        $this->assertEquals( '2013-05-20', $date );
    }

    /**
     * @covers DateTimeService::getWeekDayOfDate()
     */
    public function testGetWeekdayOfMessage()
    {
        $this->assertEquals( 'monday', $this->dateTimeService->getWeekDayOfDate('2013-08-12'));
        $this->assertEquals( 'tuesday', $this->dateTimeService->getWeekDayOfDate('2013-08-13'));
        $this->assertEquals( 'wednesday', $this->dateTimeService->getWeekDayOfDate('2013-08-14'));
        $this->assertEquals( 'thursday', $this->dateTimeService->getWeekDayOfDate('2013-08-15'));
        $this->assertEquals( 'friday', $this->dateTimeService->getWeekDayOfDate('2013-08-16'));
        $this->assertEquals( 'saturday', $this->dateTimeService->getWeekDayOfDate('2013-08-17'));
        $this->assertEquals( 'sunday', $this->dateTimeService->getWeekDayOfDate('2013-08-18'));
    }

    /**
     * @covers DateTimeService::convertTimeToThirtyMinuteTimestamp()
     */
    public function testConvertTimeToThirtyMinuteTimestamp()
    {
        $this->assertEquals( '00:30', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('00:46'));
        $this->assertEquals( '15:30', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('15:30'));
        $this->assertEquals( '18:00', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('18:21'));
        $this->assertEquals( '00:00', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('00:00'));
        $this->assertEquals( '23:30', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('23:59'));
        $this->assertEquals( '21:30', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('21:31'));
        $this->assertEquals( '16:00', $this->dateTimeService->convertTimeToThirtyMinuteTimestamp('16:15'));
    }

}