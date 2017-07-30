<?php

class User extends Customer{
    protected $USER_ID;
    protected $USER_FIRST_NAME;
    protected $USER_LAST_NAME;

    protected $SCHEDULE = array(
        "monday" => [],
        "tuesday" => [],
        "wednesday" => [],
        "thursday" => [],
        "friday" => [],
        "saturday" => [],
        "sunday" => []
    );

    function __construct($USER_ID, $USER_FIRST_NAME, $USER_LAST_NAME){
        $this->USER_ID = $USER_ID;
        $this->USER_FIRST_NAME = $USER_FIRST_NAME;
        $this->USER_LAST_NAME = $USER_LAST_NAME;
    }

    function addToSchedule(Customer $customer){

    }

    function removeFromSchedule($jobId){

    }
}

class Customer{
    protected $JOB_ID;
    protected $CUSTOMER_NAME;
    protected $CITY;
    protected $STATE;
    protected $SCHEDULED_DATE_TIME;
}