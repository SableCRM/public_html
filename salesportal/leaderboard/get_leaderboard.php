<?php

	header('Access-Control-Allow-Origin: *');
	//header('Access-Control-Allow-Methods: GET, POST');

	//print_r($_POST); exit;

	// when posting to this script, we are expecting a company id and a date array that includes a week, month and year array that each contain a start and an end date.
	if(!isset($_POST["company"], $_POST["date"]))
	{
		echo "Company id and date-range are required to continue"; exit;
	}

	// object of data to pass to leaderboard, representing data for week, month, year
	$data = new stdClass();
	//$data->filter = $_POST["filter"];

	require_once "../../../Integration/Connection.php";

	// call getRecords function 3 times and pass in the week, month and year and store the results from each

	//$leaderboard = new \Leaderboard\classes\LeaderboardDb($dbConn, $company);

	foreach($_POST["date"] as $key => $value)
	{
		switch($key)
		{
			case "week":
				$data->week = getRecords(new Connection(), $value);
				break;

			case "month":
				$data->month = getRecords(new Connection(), $value);
				break;

			case "year":
				$data->year = getRecords(new Connection(), $value);
				break;
		}
	}

	echo json_encode($data);

	function getRecords(Connection $dbConn, array $date)
	{
		$rows = false;

		// fetch top 20 users from database based on volume.
		$sql = $dbConn->prepare("SELECT trim(group_concat(DISTINCT USR.USER_FIRST_NAME, ' ', USR.USER_LAST_NAME)) AS USER_NAME, LEADER_BOARD.INSTALL_DATE, COUNT(*) AS JOB_COUNT, ROUND(AVG(LEADER_BOARD.RMR), 2) AS AVG_RMR, FLOOR(SUM(CASE WHEN LEADER_BOARD.ACH = 'ACH' THEN 1 END) / COUNT(*) * 100) AS HAS_ACH, FLOOR(SUM(CASE WHEN LEADER_BOARD.CONTRACT_TERM = '60 Months' THEN 1 END) / COUNT(*) * 100) AS 60_MONTHS FROM sablrcrm_test.LEADER_BOARD JOIN sablrcrm_test.USR ON LEADER_BOARD.COMPANY_ID = USR.COMPANY_ID WHERE USR.USER_ID = LEADER_BOARD.USER_ID AND LEADER_BOARD.COMPANY_ID = :COMPANY_ID AND LEADER_BOARD.INSTALL_DATE >= :START_DATE AND LEADER_BOARD.INSTALL_DATE <= :END_DATE GROUP BY LEADER_BOARD.USER_ID ORDER BY JOB_COUNT DESC LIMIT 20");

		try
		{
			$sql->execute(
				[
					":COMPANY_ID" => $_POST["company"],
					":START_DATE" => $date["start"],
					":END_DATE"   => $date["end"]
				]
			);

			if($sql->rowCount() > 0)
			{
				$rows = $sql->fetchAll(PDO::FETCH_OBJ);
			}
		}
		catch(PDOException $e)
		{
			print_r($e->getMessage());
		}

		return $rows;
	}