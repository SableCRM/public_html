<?php

	namespace Sable;

	use Connection;
	use Zoho;

	class FUNCTIONS
	{
		//public const ARRAY_FORMAT = 'array';
		//public const JSON_FORMAT = 'json';

		public static function AUTO_GEN_CS($ZOHO_AUTH_ID, $COMPANY_ID, $SELECTED_JOB)
		{

			// import custom database connection and automatically resolves path
			@self::RESOLVE_PATH("Integration/Connection.php");

			// import custom zoho api class and automatically resolves path
			@self::RESOLVE_PATH('Integration/ZOHO-API/zoho.php');

			// create an instance of zoho api
			$zohoApi = new Zoho($ZOHO_AUTH_ID);

			// get the info for the selected job
			$deal = $zohoApi->Get('Potentials', $SELECTED_JOB, "array");

			// create instance of database connection
			$dbConn = new Connection();

			// sql query to pull available cs number from database and mark retrieved cs number as reserved
			$sql = $dbConn->prepare(

				"SELECT @id := CS_NUMBERS.ID AS ID, CS_NUMBERS.CS_NUMBER, CS_NUMBERS.REC_NUMBER FROM sablrcrm_test.CS_NUMBERS WHERE CS_NUMBERS.COMPANY_ID = ? AND CS_NUMBERS.STATUS = 'AVAILABLE' LIMIT 1; UPDATE sablrcrm_test.CS_NUMBERS SET CS_NUMBERS.STATUS = 'RESERVED', CS_NUMBERS.JOB_ID = ? WHERE CS_NUMBERS.ID = @id;"

			);

			// retrieve 1 available cs number from database and mark it as reserved
			try{
				$sql->execute([
					$COMPANY_ID, $SELECTED_JOB
				]);
			} catch(\Exception $e){

				return $e->getMessage();
			}


			$result = false; //initialize $result variable to false
			if($sql->rowCount() > 0){
				$rows = $sql->fetchAll(\PDO::FETCH_OBJ);

				$result = $rows;
			}

			// check to make sure that the deal doesnt already have a cs assigned. if no cs number is currently assigned assign cs number and rec number
			if(empty($deal["CS Number"]) || is_null($deal["CS Number"])){

				return $zohoApi->Set("Potentials", $SELECTED_JOB,
					json_encode(
						[
							"CS Number"      => $result[0]->CS_NUMBER,
							"Receiver Phone" => $result[0]->REC_NUMBER
						]
					)
				);
			} else{

				$sql = $dbConn->prepare("UPDATE CS_NUMBERS SET STATUS = 'AVAILABLE', JOB_ID = NULL WHERE ID = ?");

				$sql->execute([$result[0]->ID]);

				return $result[0]->CS_NUMBER." ".$result[0]->REC_NUMBER;
			}
		}

		public static function RESOLVE_PATH($PATH)
		{
			$dir = '';
			$status = false;
			while($status == false){
				$status = include_once $dir.$PATH;
				$dir .= '../';
			}
		}

		public static function UPLOAD_CS_NUMBERS($START_VALUE, $END_VALUE, $REC_NUMBER, $COMPANY_ID)
		{
			/**
			 * import custom database connection and automatically resolves path
			 */
			@self::RESOLVE_PATH('Integration/DATABASE_CONNECTION.php');

			$sql = "INSERT INTO CS_NUMBERS SET COMPANY_ID = ?, CS_NUMBER = ?, REC_NUMBER = ?, STATUS = 'AVAILABLE';
                SELECT COMPANY.COMPANY_NAME, CS_NUMBERS.CS_NUMBER FROM CS_NUMBERS JOIN COMPANY ON 
                CS_NUMBERS.COMPANY_ID = COMPANY.COMPANY_ID WHERE CS_NUMBERS.ID = LAST_INSERT_ID()";

			$status = [];

			for($i = $START_VALUE; $i <= $END_VALUE; $i++){
				$params = array(
					$COMPANY_ID, $i, $REC_NUMBER
				);
				array_push($status, Connect($sql, $params, "array"));
			}

			return json_encode($status);
		}

		public static function GET_AVAILABLE_CS_NUMBERS($COMPANY)
		{
			/**
			 * import custom database connection and automatically resolves path
			 */
			@self::RESOLVE_PATH('Integration/DATABASE_CONNECTION.php');

			$sql = "SELECT count(*) AS AVAILABLE_CS_NUMBERS FROM CS_NUMBERS WHERE COMPANY_ID = ? AND STATUS = 'AVAILABLE'";

			return Connect($sql, array($COMPANY), "array");
		}
	}