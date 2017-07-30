<?php

	namespace Leaderboard\classes;

	use CristianPontes\ZohoCRMClient\Response\Record;
	use Helpers\helpers\classes\DBResult;
	use Helpers\pdo;

	class LeaderboardDb
	{
		private $dbConn;

		private $dbResults;

		private $company;

		private $date;

		public function __construct($company, $date = null)
		{
			$this->dbConn = (new pdo())->getConnection();

			$this->dbResults = new DBResult();

			$this->company = $company;

			if($date != null) $this->setDate($date);
		}

		public function setDate($date = null)
		{
			$this->date = $date ?? "today";

			return $this;
		}

		public function addRecord(Record $deal)
		{
			if(!$this->duplicateRecord($deal->get("POTENTIALID"))){
				$sql = $this->dbConn->prepare("INSERT INTO sablrcrm_test.LEADER_BOARD SET LEADER_BOARD.USER_ID = :USER_ID, LEADER_BOARD.COMPANY_ID = :COMPANY_ID, LEADER_BOARD.JOB_ID = :JOB_ID, LEADER_BOARD.INSTALL_DATE = :INSTALL_DATE, LEADER_BOARD.ACH = :ACH, RMR = :RMR, LEADER_BOARD.CONTRACT_TERM = :CONTRACT_TERM; SELECT last_insert_id()");

				$this->dbResults->runQuery($sql, [
						":COMPANY_ID"    => $this->company,
						":JOB_ID"        => $deal->get("POTENTIALID"),
						":USER_ID"       => $deal->get("Sales Person_ID"),
						":RMR"           => $deal->get("RMR"),
						":ACH"           => $deal->get("Easy Pay Method"),
						":INSTALL_DATE"  => $deal->get("Install Date and Time"),
						":CONTRACT_TERM" => $deal->get("Contract Term"),
					]
				);
			}

			return $this->dbResults->getResult();
		}

		private function duplicateRecord($recordId)
		{
			$sql = $this->dbConn->prepare("SELECT LEADER_BOARD.COMPANY_ID, LEADER_BOARD.JOB_ID FROM sablrcrm_test.LEADER_BOARD WHERE LEADER_BOARD.COMPANY_ID = :COMPANY_ID AND  LEADER_BOARD.JOB_ID = :JOB_ID");

			$this->dbResults->runQuery($sql, [
					":COMPANY_ID" => $this->company,
					":JOB_ID"     => $recordId
				]
			);

			return ($sql->rowCount() > 0) ? true : false;
		}

		public function getRecords()
		{
			$sql = $this->dbConn->prepare("SELECT trim(group_concat(DISTINCT USR.USER_FIRST_NAME, ' ', USR.USER_LAST_NAME)) AS USER_NAME, LEADER_BOARD.INSTALL_DATE, COUNT(*) AS JOB_COUNT, ROUND(AVG(LEADER_BOARD.RMR), 2) AS AVG_RMR, FLOOR(SUM(CASE WHEN LEADER_BOARD.ACH = 'ACH' THEN 1 END) / COUNT(*) * 100) AS HAS_ACH, FLOOR(SUM(CASE WHEN LEADER_BOARD.CONTRACT_TERM = '60 Months' THEN 1 END) / COUNT(*) * 100) AS 60_MONTHS FROM sablrcrm_test.LEADER_BOARD JOIN sablrcrm_test.USR ON LEADER_BOARD.COMPANY_ID = USR.COMPANY_ID WHERE USR.USER_ID = LEADER_BOARD.USER_ID AND LEADER_BOARD.COMPANY_ID = :COMPANY_ID AND LEADER_BOARD.INSTALL_DATE >= :START_DATE AND LEADER_BOARD.INSTALL_DATE <= :END_DATE GROUP BY LEADER_BOARD.USER_ID ORDER BY JOB_COUNT DESC LIMIT 20");

			$this->dbResults->runQuery($sql, [
					":COMPANY_ID" => $this->company,
					":START_DATE" => $this->date[0],
					":END_DATE"   => $this->date[1]
				]
			);

			return $this->dbResults->getResult();
		}
	}