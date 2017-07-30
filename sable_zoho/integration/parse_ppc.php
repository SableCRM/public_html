<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 5/17/2017
	 * Time: 2:14 PM
	 */

	// debug.
	//print_r($_POST); exit;
	//print_r(getId($_POST["json"])); exit;
	//print_r(getError($_POST["json"])); exit;

	if($_POST["parse_json"]){
		if(checkSuccess($_POST["json"])){
			echo getId($_POST["json"]);
		} else{
			printError(getError($_POST["json"]));
		}
	}

	function printError($message)
	{
		$status = [
			"post variables" => $_POST,
			"output"         => $message
		];

		// send error message to dev.
		mail("ainsley.clarke@guardme.com", "Sable_PPC-Lead", json_encode($status));

		// print error message to output.
		print_r($message);
		exit;
	}

	function checkSuccess($message)
	{
		$status = false;

		$message = json_decode($message)->message;

		if(strtolower($message) == "record(s) added successfully"){
			$status = true;
		}

		return $status;
	}

	function getId($message)
	{
		return json_decode($message)->Id;
	}

	function getError($message)
	{
		return json_decode($message)->message;
	}

	function getErrorCode($message)
	{
		return null;
	}