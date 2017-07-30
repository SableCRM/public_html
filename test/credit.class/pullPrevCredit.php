<?php
/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/26/2017
 * Time: 8:07 PM
 */

namespace credit;

class pullPrevCredit extends \credit{

    public function pullPrev(array $params){

        $this->PASS = "109";

        $this->TOKEN = $params["token"];

        $this->verifyPassword($params["password"]);

        $this->verifyUsername($params["username"]);

        $this->makeRequest(

            array(
                $this->ACCOUNT,
                $this->PASSWD,
                $this->PASS,
                $this->TOKEN
            )
        );

        return $this->creditResult;

    }
}