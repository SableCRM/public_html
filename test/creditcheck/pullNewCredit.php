<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/26/2017
 * Time: 8:04 PM
 */

namespace credit;

class pullNewCredit extends credit{

    public function __construct($params){

        parent::__construct($params);

        $this->PASS = "2";
    }

    public function pullNew(){

        $this->creditResult = $this->makeRequest(
            array(
                $this->ACCOUNT,
                $this->PASSWD,
                $this->PASS,
                $this->PROCESS,
                $this->BUREAU,
                $this->PRODUCT,
                $this->FIRST_NAME." ".$this->LAST_NAME,
                $this->SSN,
                $this->ADDRESS,
                $this->CITY,
                $this->STATE,
                $this->ZIP,
                $this->DOB
            )
        );

        return $this->creditResult;
    }
}