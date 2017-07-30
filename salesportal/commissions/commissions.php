<?php

	//print_r($_POST);

	use Commissions\classes\CommissionsDatabase;
	use Commissions\classes\RunCommissions;
	use Commissions\plans\PowerHome_1099;
	use Commissions\plans\PowerHome_W2;
	use Helpers\pdo;

	session_start();

	require_once "../commissions/vendor/autoload.php";
	require_once "../../../helpers/vendor/autoload.php";
	require_once "../../../wsdl2php_generated/vendor/autoload.php";
	require_once "../../../Integration/Connection.php";

	$dbConn = new Connection();

	/**
	 * when this file runs, we need to grab the logged in user and retrieve all the sales for the selected date-range from
	 * the server and run it through the commissions calculator and add each job to an array with all the info that is needed
	 * to populate the form along with the amount of each job and the total for all jobs for the logged in user
	 */
	require_once '../../../Integration/ZOHO-API/zoho.php';

	if($_POST['set-commission']){
		/**
		 * @todo, find a better way to handle this across companies
		 */
		$result = false;

		if($_POST['company-id'] == '2144870000000459009'){
			$result = COMM_CALC_1();
		} else if(($_POST['company-id'] == '2144870000000244005') && ($_POST['commission-plan'] == 'W2')){
			$result = COMM_W2_CALC();
		} else if(($_POST['company-id'] == '2144870000000244005') && ($_POST['commission-plan'] == '1099')){
			$result = COMM_1099_CALC();
		}

		print_r($result);

//		$sql = $dbConn->prepare("REPLACE INTO USR_COMMISSIONS SET COMPANY_ID = ?, USER_ID = ?, COMMISSION = ?, DEAL_ID = ?, INSTALL_TYPE = ?, PAYMENT_METHOD = ?, CUSTOMER_NAME = ?, INSTALL_DATE = ?, CUSTOMER_ID = ?, SELF_GENERATED = ?, ACTIVATION = ?, INVOICE = ?, MONITORING_LEVEL = ?, POINTS_GIVEN = ?, RMR = ?, LENGTH_OF_CONTRACT = ?, FUNDED_DATE = ?,MANAGER_OVERIDE = ?, DATE_ADDED = NOW()");
//
//		try
//		{
//			$sql->execute(array(
//				$_POST['company-id'],
//				$_POST['salesperson-id'],
//				$result->OUTPUT,
//				$_POST['deal-id'],
//				$_POST['account-type'],
//				$_POST['payment-method'],
//				$_POST['contact-name'],
//				$_POST['install-date'],
//				$_POST['contact-id'],
//				$_POST['self-gen'],
//				$_POST['activation'],
//				$_POST['invoice-amount'],
//				$_POST['monitoring-level'],
//				$_POST['points-given'],
//				$_POST['rmr'],
//				$_POST['contract-term'],
//				$_POST['funded-date'],
//				$_POST['manager-override']
//			));
//			echo $result->OUTPUT;exit;
//		}
//		catch(Exception $ex)
//		{
//			echo $ex->getCode();
//		}
	}

	/**
	 * post request to get salesrep commission from database
	 */
//	if($_POST['get-commissions']){
//		$sql = $dbConn->prepare("SELECT * FROM USR_COMMISSIONS WHERE USER_ID = ? AND COMPANY_ID = ? AND (INSTALL_DATE BETWEEN ? AND ?)");
//		try{
//			$sql->execute(array(
//				$_SESSION['user']->USER_ID,
//				$_SESSION['user']->COMPANY_ID,
//				$_POST['date-fr'],
//				$_POST['date-to']
//			));
//			if($sql->rowCount() > 0){
//				$row = $sql->fetchAll(PDO::FETCH_OBJ);
//				foreach ($row as $entry){
//					$entry->USER_NAME = $_SESSION['user']->USER_FIRST_NAME.' '.$_SESSION['user']->USER_LAST_NAME;
//				}
//				die(json_encode($row));
//			} else {
//				die($sql->rowCount()." results were returned for this query.");
//			}
//		} catch(Exception $ex) {
//			die($ex->getMessage());
//		}
//	}

	function COMM_W2_CALC()
	{
//		global $dbConn;
//
//		$contractTerm = explode(" ", $_POST["contract-term"]);
//
//		$sql = $dbConn->prepare("CALL COMM_W2_CALC(
//        :Outside_Salesman_Name,
//        :CUSTOMER_NAME,
//        :INSTALL_DATE,
//        :V_RMR,
//        :V_CREDIT,
//        :V_DEVICE_ID,
//        :V_COMM_PLAN,
//        :V_COMM_SUB_PLAN,
//        :V_ACH_FLAG,
//        :V_ACTIVATION_FEE,
//        :V_ADC_FLAG,
//        :V_SRC,
//        :V_TYPE,
//        :V_SALESMAN_FLAG,
//        :V_POINTS,
//        :V_WHOLESALE_COST,
//        :V_LENGTH_OF_CONTRACT,
//        @OUTPUT
//    )");
//
//		try{
//			$src = $_POST['self-gen'];
//
//			if($src == "Self Generated")
//			{
//				$selfGen = "SELF";
//			}
//			else
//			{
//				$selfGen = "COMPANY";
//			}
//
//			$sql->execute([
//				':Outside_Salesman_Name' => $_POST['salesperson-name'],
//				':CUSTOMER_NAME' => $_POST['contact-name'],
//				':INSTALL_DATE' => $_POST['install-date'],
//				':V_RMR' => $_POST['rmr'],
//				':V_CREDIT' => $_POST['credit-score'],
//				':V_DEVICE_ID' => $_POST[''],
//				':V_COMM_PLAN' => $_POST['commission-plan'],
//				':V_COMM_SUB_PLAN' => $_POST['commission-sub-plan'],
//				':V_ACH_FLAG' => (strtolower($_POST['payment-method']) == 'ach') ? true : false,
//				':V_ACTIVATION_FEE' => $_POST['activation'],
//				':V_ADC_FLAG' => (strtolower($_POST['monitoring-level']) == 'landline') ? false : true,
//				':V_SRC' => $selfGen,
//				':V_TYPE' => $_POST['account-type'],
//				':V_SALESMAN_FLAG' => $_POST[''],
//				':V_POINTS' => $_POST['points-given'],
//				':V_WHOLESALE_COST' => $_POST['invoice-amount'],
//				':V_LENGTH_OF_CONTRACT' => $contractTerm[0]
//			]);
//
//			$sql = $dbConn->prepare("SELECT @OUTPUT AS OUTPUT;");
//
//			$sql->execute();
//
//			if($sql->rowCount() > 0)
//			{
//				$row = $sql->fetchAll(PDO::FETCH_OBJ);
//				return $row[0];
//			}
//			else
//			{
//				return $sql->rowCount()." rows were returned from this query.";
//			}
//		}
//		catch(Exception $ex)
//		{
//			return $ex->getMessage();
//		}
		$powerHomecommission = new RunCommissions($_POST, new CommissionsDatabase(new pdo()));

		$deal = $powerHomecommission->getDeal();

		$user = $powerHomecommission->getUserFromDeal($deal);

		$contractTerm = explode(" ", $deal["Contract Term"]);

		$src = $deal['Lead Source'];

		if($src == "Self Generated"){
			$selfGen = "SELF";
		} else{
			$selfGen = "COMPANY";
		}

		$params = [
			'OUTSIDE_SALESMAN_NAME' => $deal['Sales Person'],
			'CUSTOMER_NAME'         => $deal['Contact Name'],
			'INSTALL_DATE'          => $deal['Install Date and Time'],
			'RMR'                   => $deal['RMR'],
			'CREDIT'                => $deal['Contact Credit Score'],
			'DEVICE_ID'             => $deal[''],
			'COMM_PLAN'             => $user['Commission Plan'],
			'COMM_SUB_PLAN'         => $user['Sub Plan'],
			'ACH_FLAG'              => (strtolower($deal['Easy Pay Method']) == 'ach') ? true : false,
			'ACTIVATION_FEE'        => $deal['Activation Fee'],
			'ADC_FLAG'              => (strtolower($deal['Monitoring Level']) == 'landline') ? false : true,
			'SRC'                   => $selfGen,
			'TYPE'                  => $deal['Account Type'],
			'SALESMAN_FLAG'         => $deal[''],
			'POINTS'                => $deal['Total Points'],
			'WHOLESALE_COST'        => $deal['Amount'],
			'LENGTH_OF_CONTRACT'    => $contractTerm[0],
		];

		$result = $powerHomecommission->getCommission(new PowerHome_W2($params));

		return $result;

//		COMM_W2_CALC (
//  IN Outside_Salesman_Name varchar(100),
//  IN CUSTOMER_NAME varchar(100),
//  IN INSTALL_DATE timestamp,
//  IN V_RMR double,
//  IN V_CREDIT double,
//  IN V_DEVICE_ID int,
//  IN V_COMM_PLAN varchar(100),
//  IN V_COMM_SUB_PLAN varchar(100),
//  IN V_ACH_FLAG_N int,
//  IN V_ACTIVATION_FEE double,
//  IN V_ADC_FLAG_N int,
//  IN V_SRC varchar(100),
//  IN V_TYPE varchar(100),
//  IN V_SALESMAN_FLAG_N int,
//  IN V_POINTS double,
//  IN V_WHOLESALE_COST double,
//  OUT V_COMMISSION double,
//  IN V_LENGTH_OF_CONTRACT int
//)
	}

	function COMM_1099_CALC()
	{
		$powerHomecommission = new RunCommissions($_POST, new CommissionsDatabase(new pdo()));

		$deal = $powerHomecommission->getDeal();

		$user = $powerHomecommission->getUserFromDeal($deal);

		$params = [
			"salesperson"    => $deal["Sales Person"],
			"customer_name"  => $deal["Contact Name"],
			"install_date"   => $deal["Install Date and Time"],
			"rmr"            => $deal["RMR"],
			"cell_ll_type"   => $deal["Monitoring Level"],
			"comm_plan"      => $user["Commission Plan"],
			"comm_sub_plan"  => $user["Sub Plan"],
			"mos"            => $deal["Contract Term"],
			"points"         => $deal["Total Points"],
			"activation_fee" => $deal["Activation Fee"],
			"comm_res"       => $deal["Residential/Commercial"],
			"ach_flag"       => $deal["Easy Pay Method"],
			"wholesale_cost" => $deal["Amount"],
			"src"            => $deal["Lead Source"],
			"credit"         => $deal["Contact Credit Score"],
		];

		$result = $powerHomecommission->getCommission(new PowerHome_1099($params));

		return $result;
	}

	function COMM_CALC_1()
	{
		global $dbConn;
		$sql = $dbConn->prepare("CALL COMM_CALC_1(
        :Deal_ID, 
        :Customer_ID, 
        :Customer_Name, 
        :Sales_Person_ID, 
        :Sales_Person, 
        :Install_Date, 
        :Funded_Date, 
        :First_Notice_FLAG, 
        :Payment_Method, 
        :Resi_COMM, 
        :Self_Gen_FLAG, 
        :Monitoring_Level, 
        :Points_Given, 
        :Invoice_Amount, 
        :Activation, 
        :V_RMR, 
        @OUTPUT
    );");
		try{
			$sql->execute(array(
				':Deal_ID'           => $_POST['deal-id'],
				':Customer_ID'       => $_POST['contact-id'],
				':Customer_Name'     => $_POST['contact-name'],
				':Sales_Person_ID'   => $_POST['salesperson-id'],
				':Sales_Person'      => $_POST['salesperson-name'],
				':Install_Date'      => $_POST['install-date'],
				':Funded_Date'       => $_POST['funded-date'],
				':First_Notice_FLAG' => null,
				':Payment_Method'    => $_POST['payment-method'],
				':Resi_COMM'         => $_POST['account-type'],
				':Self_Gen_FLAG'     => $_POST['self-gen'],
				':Monitoring_Level'  => $_POST['package-type'],
				':Points_Given'      => $_POST['points-given'],
				':Invoice_Amount'    => $_POST['invoice-amount'],
				':Activation'        => $_POST['activation'],
				':V_RMR'             => $_POST['rmr'],
			));
			$sql = $dbConn->prepare("SELECT @OUTPUT AS OUTPUT;");
			$sql->execute();

			if($sql->rowCount() > 0){
				$row = $sql->fetchAll(PDO::FETCH_OBJ);

				return $row[0];
			} else{
				return $sql->rowCount()." rows were returned from this query.";
			}
		} catch(Exception $ex){
			return $ex->getMessage();
		}
	}