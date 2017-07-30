<?php

	use Commissions\classes\CommissionsDatabase;
	use Commissions\classes\RunCommissions;
	use Helpers\pdo;

	require_once dirname(__DIR__, 4)."/vendor/autoload.php";

	$commDb = new CommissionsDatabase(new pdo());

	$pwrHmComm = new RunCommissions($_POST, $commDb);

	$commPlan = ["1099" => "Commissions\plans\PowerHome_1099", "W2" => "Commissions\plans\PowerHome_W2"];

	$result = (new $commPlan[$_POST["commissionPlan"]]($pwrHmComm))->getResult();

	print_r($result);