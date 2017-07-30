<?php

	use Helpers\helpers\classes\CompanyIds;
	use Helpers\helpers\classes\Deal;
	use Leaderboard\classes\LeaderboardDb;

	require_once dirname(__DIR__, 3)."/vendor/autoload.php";

	$leaderboard = new LeaderboardDb(CompanyIds::GUARDME, ["2017-01-01", "2017-12-31"]);

	$deal = new Deal(CompanyIds::GUARDME);

	$record = $deal->getDeal("1486524000036883534");

	$leaderboard->addRecord($record);
	exit;

	$deal = new Deal(CompanyIds::GUARDME);

	print_r($deal);
	exit;

	$record = $deal->getDeal("1486524000036883534");

	$leaderboard
		//->getRecords();
		->addRecord($record);

	//require_once "../../../Integration/ZOHO-API/zoho.php";
	//
	//print_r(Zoho::GenerateToken("srourk@pht.com", "Noboo2000", "SableCRM", "crmapi"));