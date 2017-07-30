<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/26/2017
 * Time: 8:04 PM
 */

namespace credit\credit;

class pullNewCredit extends credit{

    public function __construct($params){

        parent::__construct($params);

        $this->PASS = "2";
    }

    public function pullNew(){

        $this->creditResult = $this->makeRequest(

            "ACCOUNT=".$this->ACCOUNT.
            "&PASSWD=".$this->PASSWD.
            "&PASS=".$this->PASS.
            "&PROCESS=".$this->PROCESS.
            "&BUREAU=".$this->BUREAU.
            "&PRODUCT=".$this->PRODUCT.
            "&NAME=".$this->FIRST_NAME." ".$this->LAST_NAME.
            "&SSN=".$this->SSN.
            "&ADDRESS=".$this->ADDRESS.
            "&CITY=".$this->CITY.
            "&STATE=".$this->STATE.
            "&ZIP=".$this->ZIP.
            "&DOB=".$this->DOB
        );

        return $this->creditResult;
    }
}