<?php

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;

	require_once "../../../helpers/vendor/autoload.php";
	require_once "../../../wsdl2php_generated/vendor/autoload.php";

//	class ZohoExt extends ZohoCRMClient
//	{
//		const COMPANY      = "2144870000000459009";
//		const RECORD       = "1486524000036229420";
//		const BOOKS_RECORD = "1486524000036554985";
//		const AUTH         = "5b69810dc50fa3a7d24aeafdd2b738a3";
//		const BOOKS_AUTH   = "00de4145eb45fe2fecc7e396ca51611f";
//
//		private $result;
//
//		public function __construct($module)
//		{
//			parent::__construct($module, self::AUTH);
//		}
//
//		public function getPickLists()
//		{
//
//		}
//
//	}
//
//	$zoho = new ZohoExt("");
//
//	$result = $zoho->getRecordById($zoho::BOOKS_RECORD)
//		->request();
//
//	print_r($result);

//	$result = $zoho->updateRecords()
//		->triggerWorkflow()
//		->addRecord(
//			[
//				"Id"         => $zoho::RECORD,
//				"ADC Extras" => "Help;Me;Please"
//			]
//		)->request();
//
//	print_r($result);

//	$results = $zoho->getFields()
//		->request();
//
//	$picklists = [];
//
//	foreach($results as $result)
//	{
//		if($result->type == "Pick List")
//		{
//			$picklists[$result->label] = $result->options;
//		}
//	}
//
//	echo "<pre>";
//	print_r($picklists);

	$zohoApi = new ZohoCRMClient("Potentials", "506aae7d1170985774229c30d8570b35");

	$allRecords = [];
	$fromIndex = 1;
	$toIndex = 200;
	$cycles = 0;

	do{
		$deals = $zohoApi->searchRecords()
			->fromIndex($fromIndex)
			->toIndex($toIndex)
			->selectColumns
			(
				[
					"POTENTIALID",
					"RMR",
					"Sales Person",
					"Easy Pay Method",
					"Install Date and Time"
				]
			)
			->where("Install Status", "Completed")
			->withEmptyFields()
			->request();

		foreach($deals as $deal){
//			if($deal->get("Sales Person") != "null" && $deal->get("Easy Pay Method") != "null")
//			{
//				array_push($allRecords, $deal);
//			}

			array_push($allRecords, $deal);
		}

		foreach($allRecords as $record){
			print_r($record->data["POTENTIALID"]."\r\n");
		}

		$fromIndex = $fromIndex + $toIndex;
		$toIndex = $fromIndex + 200;
		$cycles++;
	} while($cycles < 2);