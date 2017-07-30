<?php

	session_start();

	if(isset($_SESSION["user"]->USER_ID)){

		require_once "../../Integration/Connection.php";
		require_once "../../Integration/ZOHO-API/zoho.php";
		$zohoApi = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);

		if(isset($_SESSION["deal-id"])){

			$deal = $zohoApi->Get("Potentials", $_SESSION["deal-id"], "array");
			$_SESSION["deal"] = $deal;
		}
		if($_POST["e-contract"]){

			require_once "e-contract.php";

			$eContractResult = isset($eContractResult) ? $eContractResult : false;
			if(count($eContractResult["signing-urls"]) > 0){

				try
				{
					$signingUrl = array_shift($eContractResult["signing-urls"]);

					$subject = "Security System e-Contract Agreement";

					$to = $_SESSION["customer-info"]["email"];

					$from = "e-contract@sablecrm.com";

					$html = 'Click link to sign contract: '.$signingUrl;

					send_email($from, $to, $subject, $html);

					$zohoApi->Set("Potentials", $_SESSION["deal-id"],
						json_encode(
							array(
								"E-Contract Signing Link" => $signingUrl,
								"Agreement Sent Date" => strftime($zohoApi->zoho_time_format),
								"Moni_Envelope_Id" => $eContractResult["envelope-id"],
								"E-Contract ID" => $eContractResult["contract-id"],
								"Stage" => "Agreement Sent"
							)
						)
					);

					/**
					 * UPLOAD CONTRACT INFORMATION TO THE E_CONTRACT_SENT TABLE.
					 */
					$dbConn = new Connection();
					$sql = $dbConn->prepare("REPLACE INTO sablrcrm_test.E_CONTRACT_SENT SET E_CONTRACT_SENT.EMAIL = ?, E_CONTRACT_SENT.USER_ID = ?, E_CONTRACT_SENT.JOB_ID = ?,E_CONTRACT_SENT.COMPANY_ID = ?, E_CONTRACT_SENT.CONTRACT_ID = ?, E_CONTRACT_SENT.ENVELOPE_ID = ?, E_CONTRACT_SENT.STATUS = 'SENT'");

					$sql->execute(array($_SESSION["customer-info"]["email"], $_SESSION["user"]->USER_ID, $_SESSION["deal-id"], $_SESSION["user"]->COMPANY_ID, $eContractResult["contract-id"], $eContractResult["envelope-id"]));

					$data = array(
						"success" => true,
						"message" => "Thank you!"
					);
				}
				catch(Exception $e){
					$data = array(
						"success" => false,
						"message" => $e->getMessage()
					);
					echo json_encode($data);exit;
				}

				echo json_encode($data);exit;
			}
			else{
				$data = array(
					"success" => false,
					"message" => $eContractResult["contract-id"]
				);
				echo json_encode($data);exit;
			}
		}
	}
	else{

		header("location: ../portals/login.php");exit;
	}

	function send_email($from ='',$to = '', $subject = '',$msg = '')
	{
		$message = '<html>';
		$message = ucfirst($msg);
		$message .= '</html>';
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= 'From: '.$from.'' . "\r\n";
		$headers .= 'Bcc: bala121083@gmail.com' . "\r\n";
		$ret = @mail($to, $subject,$message, $headers);
		return $ret;
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Step 2: Build A Package | Sales Portal</title>
<?php require_once "../portals/head.php" ?>
</head>
<body>
<div id="portal_container" class="logged_in">
    <?php require_once "../portals/header.php" ?>
    <section id="security_system" class="page">
        <div id="sales_heading">
            <div>
                <img src="../images/package-icon.png"/>
                <div>
                    <h1>Security System</h1>
                    <div><strong>Step 2:</strong> Build A Package</div>
                </div>
            </div>
            <img src="../images/moni-logo.png"/>
        </div>
        <div id="package_modules">
            <?php require_once "modules/package-details.php" ?>
            <?php require_once "modules/payment-info.php" ?>
            <?php require_once "modules/additional-notes.php" ?>
        </div>
        <a href="#">
            <input id="confirm" type="button" class="button" value="Confirm and Send eContract"/>
        </a>
    </section>
    <?php require_once "../portals/footer.php" ?>
</div>
</body>
</html>