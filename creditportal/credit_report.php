<?php

	use Credit\credit\pullPrevCredit;

	require_once "../../Integration/Connection.php";
	require_once "../../wsdl2php_generated/vendor/autoload.php";

	$errors = [];

	storeErrors($errors);

	$token = $_GET["token"];
	$company = $_GET["company"];

	$dbConn = new Connection();

	$sql = $dbConn->prepare("SELECT * FROM sablrcrm_test.HART_USER WHERE HART_USER.COMPANY_ID = :COMPANY_ID");

	try{
		$sql->execute(
			[
				":COMPANY_ID" => $company
			]
		);

		if($sql->rowCount() > 0){
			$hartUser = $sql->fetchAll(PDO::FETCH_OBJ)[0];
		} else{
			$errors[] = "Sable was unable to find your heart credentials.";
		}
	} catch(PDOException $e){
		$errors[] = $e->getMessage();
	}

	$client = [
		"token"    => $token,
		"username" => $hartUser->HART_USER,
		"password" => $hartUser->HART_PASSWORD
	];

	$previousCredit = new pullPrevCredit($client);

	if($previousCredit->getErrors() == false){
		echo $result = $previousCredit
			->pullPrev()
			->getHtml();
	} else{
		foreach($previousCredit->getErrors() as $error){
			$errors[] = $error;
		}
	}

	function printErrors(array &$errors)
	{
		if(count($errors) > 0){
			foreach($errors as $error){
				echo $error."<br/>";
			}

			exit;
		}
	}

	function storeErrors(array &$errors)
	{
		foreach($_GET as $key => $value){
			if(is_null($value) || empty($value)){
				$errors[] = "required field ".$key." cannot be empty.";
			}
		}
	}

	printErrors($errors);
