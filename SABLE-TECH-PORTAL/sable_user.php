<?php

	use Helpers\pdo;
	use ZohoHelpers\CrmClients\ZohoCrmClient;
	use ZohoHelpers\SableUser;

	require_once "../../CrmHelpers/vendor/autoload.php";
	require_once "../../vendor/autoload.php";

	$db = new pdo();

	$action = $_POST["action"];
	$id = $_POST["id"];
	$company = $_POST["company"];
	$userPassword = $_POST["userPassword"];
	$adminCredentials = $_POST["adminCredentials"];

	try{
		$sableUser = new SableUser(new ZohoCrmClient($db->getConnection(), $company), $id);

		if($action == "add"){
			$status = $sableUser->addUser($company, $userPassword, $adminCredentials);
		} else if($action == "update"){
			$status = $sableUser->updateUser($company);
		} else if($action == "delete"){
			$status = $sableUser->deleteUser($company);
		}
	} catch(Exception $e){
		die($e->getMessage());
	}

	print_r($status);