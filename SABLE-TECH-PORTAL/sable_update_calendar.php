<?php

	use Helpers\pdo;
	use ZohoHelpers\UpdateCalendar;

	require_once "../../CrmHelpers/vendor/autoload.php";
	require_once "../../vendor/autoload.php";

	$db = (new pdo())->getConnection();

	$addJobToSchedule = new UpdateCalendar($db, $_POST["company"], $_POST["id"], $_POST["user"]);

	print_r($addJobToSchedule->update());
