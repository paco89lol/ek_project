<?php

class CurTimeInfo {
    
    var $systemTimezone;
    var $timeStamp;
    var $dateTime;
    var $year;
    var $month;
    var $day;
    var $minute;
    var $second;

    function __construct() {
        $this->systemTimezone = date_default_timezone_get();
        $timezone = 'Asia/Hong_Kong';
        date_default_timezone_set($timezone);
        $dateTime = new DateTime();
        $this->timeStamp = $dateTime->getTimestamp();
        $this->dateTime = date('Y-m-d H:i:s', $this->timeStamp);
        $this->year = date("Y", $this->timeStamp);
        $this->month = date("m", $this->timeStamp);
        $this->day = date("d", $this->timeStamp);
        $this->minute = date("i", $this->timeStamp);
        $this->second = date("s", $this->timeStamp);
        //restore default timezone
        date_default_timezone_set($this->systemTimezone);
    }

    function useTimeStamp($timeStamp) {
        $this->timeStamp = $timeStamp;
        $this->dateTime = date('Y-m-d H:i:s', $this->timeStamp);
        $this->year = date("Y", $timeStamp);
        $this->month = date("m", $timeStamp);
        $this->day = date("d", $timeStamp);
        $this->minute = date("i", $timeStamp);
        $this->second = date("s", $timeStamp);

        //restore default timezone
        date_default_timezone_set($this->systemTimezone);
    }

    function addDay($numOfDay) {
        $this->systemTimezone = date_default_timezone_get();
        $timezone = 'Asia/Hong_Kong';
        date_default_timezone_set($timezone);
        $dateTime = new DateTime("today +$numOfDay days");
        $this->timeStamp = $dateTime->getTimestamp();
        $this->dateTime = date('Y-m-d H:i:s', $this->timeStamp);
        $this->year = date("Y", $this->timeStamp);
        $this->month = date("m", $this->timeStamp);
        $this->day = date("d", $this->timeStamp);
        $this->minute = date("i", $this->timeStamp);
        $this->second = date("s", $this->timeStamp);

        //restore default timezone
        date_default_timezone_set($this->systemTimezone);
    }
    
    function subtractDay($numOfDay) {
        $this->systemTimezone = date_default_timezone_get();
        $timezone = 'Asia/Hong_Kong';
        date_default_timezone_set($timezone);
        $dateTime = new DateTime("today -$numOfDay days");
        $this->timeStamp = $dateTime->getTimestamp();
        $this->year = date("Y", $this->timeStamp);
        $this->month = date("m", $this->timeStamp);
        $this->day = date("d", $this->timeStamp);
        $this->minute = date("i", $this->timeStamp);
        $this->second = date("s", $this->timeStamp);

        //restore default timezone
        date_default_timezone_set($this->systemTimezone);
    }

    function __destruct() {
        ;
    }

}