<?php

	namespace Leaderboard\classes;

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;
	use Helpers\helpers\classes\CRMAuth;
	use Helpers\helpers\classes\database\Database;

	class LeaderboardMassUpdate extends Database
	{
		private $leaderboardDb;

		private $zohoApi;

		private $fromIndex;

		private $toIndex;

		private $cycles;

		private $records;

		private $results;

		public function __construct($company)
		{
			parent::__construct();

			$this->fromIndex = 1;

			$this->toIndex = 2;

			$this->results = [];

			$this->leaderboardDb = new LeaderboardDb($company);

			$this->zohoApi = new ZohoCRMClient("Potentials", (new CRMAuth())->setCompanyId($company)->getAuth());

			$this->searchCRM();
		}

		private function searchCRM()
		{
			$this->cycles = $this->cycles + 1;

			$this->records = $this->zohoApi->searchRecords()
				->fromIndex($this->fromIndex)
				->toIndex($this->toIndex)
				->withEmptyFields()
				->selectColumns([
					"POTENTIALID",
					"RMR",
					"Sales Person",
					"Easy Pay Method",
					"Install Date and Time"
				])
				->where("Install Status", "Completed")
				->request();

			$this->getRecords();
		}

		public function getRecords()
		{
			while(count($this->results) < 10){
				$this->fromIndex = $this->toIndex + 1;
				$this->toIndex = $this->fromIndex + $this->toIndex;

				$this->addToResults($this->records);

				if(count($this->records) == 2){
					$this->searchCRM();
				} else{
					break;
				}
			}

			return $this;
		}

		private function addToResults($records)
		{
			foreach($records as $record){
				array_push($this->results, $record);
			}
		}

		public function getResults()
		{
			return [$this->results, "Cycles" => $this->cycles];
		}
	}