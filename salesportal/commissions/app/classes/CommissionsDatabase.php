<?php

	namespace Commissions\classes;

	use Commissions\interfaces\ICalculatorData;
	use Helpers\pdo;

	class CommissionsDatabase
	{
		private $dbConn;

		public function __construct(pdo $database)
		{
			$this->dbConn = $database->getConnection();
		}

		public function getAuthId($company)
		{
			$sql = $this->dbConn->prepare("SELECT ZOHO_AUTH_ID FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = :COMPANY_ID");

			$sql->execute([":COMPANY_ID" => $company]);

			$authId = self::hasResults($sql);

			return $authId[0]->ZOHO_AUTH_ID;
		}

		private static function hasResults(\PDOStatement $sql)
		{
			$rows = false;

			if($sql->rowCount() > 0){
				$rows = $sql->fetchAll(\PDO::FETCH_OBJ);;
			}

			return $rows;
		}

		public function calculate(ICalculatorData $commissions)
		{
			$sql = $this->dbConn->prepare($commissions->getQuery());

			$sql->execute($commissions->getCalculatorData());

			return $this->getCommissionResult();
		}

		private function getCommissionResult()
		{
			$sql = $this->dbConn->prepare("SELECT @COMMISSION AS OUTPUT");

			$sql->execute();

			$commission = self::hasResults($sql);

			return $commission[0]->OUTPUT;
		}
	}