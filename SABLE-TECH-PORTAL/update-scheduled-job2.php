<?php

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;
	use Helpers\helpers\classes\CompanyIds;
	use Helpers\pdo;

	require_once "../../vendor/autoload.php";

	const CS_NUMBERS = ":CS_NUMBERS";
	const COMPANY_ID = ":COMPANY_ID";
	const REC_NUMBER = ":REC_NUMBER";
	const JOB_ID = ":JOB_ID";

//	print_r(uploadCsBlock(CompanyIds::POWER_HOME, 762221112, 762222111, 8442011545));

	print_r(getAvailableCsNumbers(CompanyIds::GUARDME));

//	print_r(getDealCsNumber(CompanyIds::GUARDME, "1486524000029065017"));

//	print_r(getAvailableCsNumber(CompanyIds::GUARDME));

	print_r(updateCsNumber(CompanyIds::GUARDME, "8836", "AVAILABLE"));

	function uploadCsNumber(\PDO $db, $params)
	{
		$sql = $db->prepare("INSERT INTO sablrcrm_test.CS_NUMBERS SET CS_NUMBERS.COMPANY_ID = ?, CS_NUMBERS.CS_NUMBER = ?, CS_NUMBERS.REC_NUMBER = ?, CS_NUMBERS.STATUS = 'AVAILABLE'");

		return $sql->execute($params);
	}

	function setParams($companyId, $recNumber, $csNumber)
	{
		$params = [
			$companyId, $csNumber, $recNumber,
		];

		return $params;
	}

	function uploadCsBlock($companyId, $blockStart, $blockEnd, $recNumber)
	{
		$count = [];

		$db = (new pdo())->getConnection();

		for($csNumber = $blockStart; $csNumber <= $blockEnd; $csNumber++){
			try{
				$count["Uploaded"] += uploadCsNumber($db, setParams($companyId, $recNumber, $csNumber));
			} catch(Exception $e){
				$count["Failed"][] = $e->getMessage();
			}
		}

		return $count;
	}

	function getAvailableCsNumbers($companyId)
	{
		$db = (new pdo())->getConnection();

		$sql = $db->prepare("SELECT COUNT(*) AS AVAILABLE FROM sablrcrm_test.CS_NUMBERS WHERE CS_NUMBERS.COMPANY_ID = ? AND CS_NUMBERS.STATUS = 'AVAILABLE'");

		if($sql->execute([$companyId])){
			return $sql->fetch(\PDO::FETCH_OBJ)->AVAILABLE;
		}
	}

	function generateCsNumber($companyId, $selectedJob)
	{

	}

	function getAuthtoken(\PDO $db, $companyId)
	{
		$sql = $db->prepare("SELECT ZOHO_AUTH_ID FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

		if($sql->execute([$companyId])){
			return $sql->fetch(\PDO::FETCH_OBJ)->ZOHO_AUTH_ID;
		}
	}

	function getDealCsNumber($companyId, $dealId)
	{
		$db = (new pdo())->getConnection();

		$zohoApi = new ZohoCRMClient("Potentials", getAuthtoken($db, $companyId));

		$result = $zohoApi->getRecordById($dealId)
			->selectColumns(["CS Number"])
			->withEmptyFields()
			->request();

		return $result[1]->get("CS Number");
	}

	function updateDeal($companyId, $dealId, $csNumber, $recNumber)
	{
		$db = (new pdo())->getConnection();

		$zohoApi = new ZohoCRMClient("Potentials", getAuthtoken($db, $companyId));

		$result = $zohoApi->updateRecords()
			->addRecord(
				[
					"Id"             => $dealId,
					"CS Number"      => $csNumber,
					"Receiver Phone" => $recNumber,
				]
			);

		return $result;
	}

	function getAvailableCsNumber($companyId)
	{
		$db = (new pdo())->getConnection();

		$sql = $db->prepare("SELECT CS_NUMBERS.ID, CS_NUMBERS.CS_NUMBER, CS_NUMBERS.REC_NUMBER FROM sablrcrm_test.CS_NUMBERS WHERE CS_NUMBERS.COMPANY_ID = ? AND STATUS = 'AVAILABLE' LIMIT 1");

		if($sql->execute([$companyId])){
			return $sql->fetch(\PDO::FETCH_OBJ);
		}
	}

	function updateCsNumber($companyId, $id, $status)
	{
		$db = (new pdo())->getConnection();

		$sql = $db->prepare("UPDATE sablrcrm_test.CS_NUMBERS SET CS_NUMBERS.STATUS = ? WHERE CS_NUMBERS.COMPANY_ID = ? AND CS_NUMBERS.ID = ?");

		return $sql->execute([$status, $companyId, $id]);
	}
