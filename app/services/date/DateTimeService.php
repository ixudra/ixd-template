<?php


class DateTimeService {

    public function getWeekOfDate($date)
    {
        $firstDayOfYear = date('Y', strtotime($date)) .'-01-01';

        $monday = $this->getLastMondayBeforeDate( $firstDayOfYear );

        $index = 0;
        while( $date > $monday ) {
            ++$index;
            $monday = date('Y-m-d', strtotime('+7 days', strtotime($monday)));
        }

        return $index;
    }

    public function getDaysOfWeek($index, $year)
    {
        if( $index < 0 ) {
            return null;
        }

        if( $year < 0 ) {
            return null;
        }

        $firstDayOfYear = $year .'-01-01';

        $monday = $this->getLastMondayBeforeDate( $firstDayOfYear );
        for( $i = 1; $i < $index; ++$i ) {
            $monday = date('Y-m-d', strtotime('+7 days', strtotime($monday)));
        }

        return array(
            'monday'        => $monday,
            'tuesday'       => date('Y-m-d', strtotime('+1 days', strtotime($monday))),
            'wednesday'     => date('Y-m-d', strtotime('+2 days', strtotime($monday))),
            'thursday'      => date('Y-m-d', strtotime('+3 days', strtotime($monday))),
            'friday'        => date('Y-m-d', strtotime('+4 days', strtotime($monday))),
            'saturday'      => date('Y-m-d', strtotime('+5 days', strtotime($monday))),
            'sunday'        => date('Y-m-d', strtotime('+6 days', strtotime($monday)))
        );
    }

    public function getWeekDayOfDate($date)
    {
        $days = array(
            'Mon'   => 'monday',
            'Tue'   => 'tuesday',
            'Wed'   => 'wednesday',
            'Thu'   => 'thursday',
            'Fri'   => 'friday',
            'Sat'   => 'saturday',
            'Sun'   => 'sunday'
        );

        return $days[ date('D', strtotime($date) ) ];
    }

    public function getLastMondayBeforeDate($date)
    {
        $monday = date('Y-m-d', strtotime('last monday', strtotime($date)));

        if( date('D', strtotime($date)) == 'Mon' ) {
            $monday = date('Y-m-d', strtotime('+7 days', strtotime($monday)));
        }

        return $monday;
    }

    public function convertTimeToThirtyMinuteTimestamp($time)
    {
        if( $time > '23:30' ) {
            return '23:30';
        }

        $timestamp = '00:30';
        while( $timestamp <= $time ) {
            $timestamp = date('H:i', strtotime('+30 minutes', strtotime($timestamp)));
        }

        return date('H:i', strtotime('-30 minutes', strtotime($timestamp)));
    }

}