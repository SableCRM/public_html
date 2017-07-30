<?php

require_once 'ZOHO-CRM.php';

require_once '../../eContractApi/vendor/autoload.php';

$options = array(

    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',

    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
);

require_once "../../Integration/Connection.php";

$dbConn = new Connection();

	mail("ainsley.clarke@guardme.com", "contract url", json_encode($_SERVER));

if(strtolower($_GET["eventname"]) == "signcomplete")
{
    // update the status of the agreement to signed.
    $sql = $dbConn->prepare("UPDATE sablrcrm_test.E_CONTRACT_SENT SET E_CONTRACT_SENT.STATUS = 'SIGNED' WHERE E_CONTRACT_SENT.EMAIL = ?");

    try
    {
    	$sql->execute(
    		[
    			$_GET["email"]
		    ]
	    );
    }
    catch(PDOException $e)
    {
    	echo "<script>"."alert(\"There was an error updating the status of your agreement to signed, press ok to continue.\")"."</script>";
    }

    // retrieve all columns from the e contract table, for the current signer based on their email.
    $sql = $dbConn->prepare("SELECT * FROM E_CONTRACT_SENT WHERE EMAIL = ?");

    try
    {
	    $sql->execute(
	    	[
	    		$_GET["email"]
		    ]
	    );

	    if($sql->rowCount() > 0)
	    {
		    $rows = $sql->fetchAll(PDO::FETCH_OBJ);
		    $contract = array_shift($rows);
		    $deal_id = $contract->JOB_ID;
	    }
	    else
	    {
		    echo "<script>"."alert(\"We were unable to find the required information for your account, please contact your sales person.\")"."</script>"; exit;
	    }
    }
    catch(PDOException $e)
    {
	    echo "<script>"."alert(\"There was an error while trying to retrieve your information from our system.\")"."</script>"; exit;
    }

    /**
     * DOWNLOAD THE CONTRACT PDFBYTES AND STORE IT AS A FILE.
     */
    $get = new \ServiceType\Get($options);

    $envelope_id = $contract->ENVELOPE_ID;

    $get_contract = new \StructType\GetContract($envelope_id);

    $get->GetContract($get_contract);

	/**
	 * @todo, add authtoken query to above query by doing join
	 */
    $zohoAuthId = false;
    $sql = $dbConn->prepare("SELECT ZOHO_AUTH_ID FROM ZOHO_USER WHERE COMPANY_ID = ?");
    $sql->execute(array($contract->COMPANY_ID));

    if($sql->rowCount() > 0){
        $rows = $sql->fetchAll(PDO::FETCH_OBJ);
        $zohoAuthId = array_shift($rows);
    }

    if ($get->GetContract($get_contract) !== false)
    {
        $contractResponse  = $get->getResult();
        //$envelope_id = $contractResponse->getGetContractResult()->getEnvelopeID();
        $pdf_bytes = $contractResponse->getGetContractResult()->getPDFBytes();

        $file_path = 'pdf/'.$envelope_id.'.pdf';
        file_put_contents($file_path ,$pdf_bytes);

        //echo '<a href="'.$file_path.'">Click here to view pdf</a>';
        $fileUpload = new FileUpload("Potentials");
        $fileUpload->setAuthToken($zohoAuthId->ZOHO_AUTH_ID);
        $fileUpload->uploadFile($deal_id, $file_path);

    } else {

        print_r($get->getLastError());
    }

	/**
	 * @todo, need to replace zoho api class with new zoho crm client
	 */
    require_once "../../Integration/ZOHO-API/zoho.php";
    $zohoApi = new Zoho($zohoAuthId->ZOHO_AUTH_ID);
    $zohoApi->Set("Potentials", $deal_id, json_encode(
        array(
            "Stage" => "Sold",
            "Agreement Signed Date" => strftime($zohoApi->zoho_time_format),
            "Moni_Envelope_Id" => $contract->ENVELOPE_ID,
            "E-Contract ID" => $contract->CONTRACT_ID
        )
    ));
    header("location: http://www.sablecrm.com");
}
if(strtolower($_GET["eventname"]) == "ttlexpired")
{
	header("location: http://sable-crm.com/test/generate_econtract.php?email=".$_GET["email"]);
}