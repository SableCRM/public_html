<?php

	use Commissions\classes\CommissionsDatabase;
	use Commissions\classes\RunCommissions;
	use Commissions\plans\GuardMe_Comm_Calc_1;
	use Helpers\pdo;

	require_once dirname(__DIR__, 4)."/vendor/autoload.php";

	$commDb = new CommissionsDatabase(new pdo());

	$guardmeCommCalc1 = new RunCommissions($_POST, $commDb);

	$result = (new GuardMe_Comm_Calc_1($guardmeCommCalc1))->getResult();

	print_r($result);