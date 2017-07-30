<?php

	use Commissions\classes\CommissionsDatabase;
	use Commissions\classes\RunCommissions;
	use Commissions\plans\A1_COMM_CALC;
	use Helpers\pdo;

	require_once dirname(__DIR__, 4)."/vendor/autoload.php";

	$commDb = new CommissionsDatabase(new pdo());

	$alpha1Comm = new RunCommissions($_POST, $commDb);

	$result = (new A1_COMM_CALC($alpha1Comm))->getResult();

	print_r($result);