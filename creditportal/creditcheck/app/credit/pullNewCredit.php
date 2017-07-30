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

    public function getParsed(){

        return $this->parseResult();
    }

    public function fullParse(){

        $credit = false;

        try{

            $creditResult = json_encode($this->parseResult());
            $creditResult = json_decode($creditResult);

            $score = (array)$creditResult->score;
            $score = array_shift($score);
            if(is_null($score) || empty($score)){

                $score = 0;
            }

            $transid = (array)$creditResult->transid;
            $transid = array_shift($transid);

            $token = (array)$creditResult->token;
            $token = array_shift($token);

            $credit = array("score" => $score, "transid" => $transid, "token" => $token);

        } catch(\Exception $ex) {

            echo $ex->getMessage();
        }

        return $credit;
    }
}