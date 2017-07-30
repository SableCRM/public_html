<?php

	namespace Commissions\classes;

	use Commissions\interfaces\ICalculatorData;
	use CristianPontes\ZohoCRMClient\ZohoCRMClient;

	class RunCommissions
	{
		protected $company;
		protected $id;
		protected $crm;
		protected $auth;
		protected $database;

		public function __construct(array $request, CommissionsDatabase $database)
		{
			$this->setId($request["id"]);

			$this->setCompany($request["company"]);

			$this->database = $database;

			$this->auth = $this->setAuth($this->database);
		}

		private function setCompany($company)
		{
			$this->company = $company;
		}

		private function setId($id)
		{
			$this->id = $id;
		}

		private function setAuth(CommissionsDatabase $database)
		{
			return $database->getAuthId($this->company);
		}

		private function setCrm(ZohoCRMClient $crm)
		{
			return $crm;
		}

		public function getDeal()
		{
			$this->crm = $this->setCrm(new ZohoCRMClient("Potentials", $this->auth));

			$deal = $this->crm->getRecordById($this->id)
				->withEmptyFields()
				->request();

			return $deal[1]->getData();
		}

		public function getUserFromDeal($deal)
		{
			$this->crm = $this->setCrm(new ZohoCRMClient("CustomModule2", $this->auth));

			$user = $this->crm->getRecordById($deal["Sales Person_ID"])
				->withEmptyFields()
				->request();

			return $user[1]->getData();
		}

		public function testGetRelatedRecords()
		{
			$this->crm = $this->setCrm(new ZohoCRMClient("CustomModule2", $this->auth));

			$user = $this->crm->getRelatedRecords()
				->id($this->id)
				->parentModule("Potentials")
				->withEmptyFields()
				->request();

			return $user[1]->getData();
		}

		public function getCommission(ICalculatorData $calculator)
		{
			return $this->database->calculate($calculator);
		}
	}