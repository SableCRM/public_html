<?php

	use Helpers\pdo;
	use ZohoHelpers\GenerateCsNumber;

	require_once "../../CrmHelpers/vendor/autoload.php";
	require_once "../../vendor/autoload.php";

	$db = (new pdo())->getConnection();

	$generateCsNumber = new GenerateCsNumber($db, $_POST["company"], $_POST["id"]);

	print_r($generateCsNumber->generateCsNumber());
