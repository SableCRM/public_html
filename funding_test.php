<?php

	use MoniFunding\ServiceType\Upsert;
	use MoniFunding\StructType\UpsertCommonFundingDataFromThirdPartyCRM;
	use WsdlToPhp\PackageBase\AbstractSoapClientBase;
	use WsdlToPhp\WsSecurity\WsSecurity;

	$result = "-> Please enter CS Number & E-Contract Id"."<br>"."-> Press Submit to continue";

	if(isset($_POST["submit"])){
		require_once "../wsdl2php_generated/vendor/autoload.php";

		try{
			$options = array(
				AbstractSoapClientBase::WSDL_URL      => 'https://mimasweb.monitronics.net/CommonFunding?wsdl',
				AbstractSoapClientBase::WSDL_CLASSMAP => \MoniFunding\ClassMap::get(),
			);

			// create WsSecurity header for econtract request.
			$wsSecurity = WsSecurity::createWsSecuritySoapHeader("FundingDealer", "J3d1Kn!gh8");

			$upsert = new Upsert($options);

			$soapClient = $upsert::getSoapClient();

			// apply WsSecurity header to soap client
			$soapClient->__setSoapHeaders($wsSecurity);


			if($upsert->UpsertCommonFundingDataFromThirdPartyCRM(new UpsertCommonFundingDataFromThirdPartyCRM("2", $_POST["username"], $_POST["password"], $_POST["cs_number"], $_POST["contract_id"])) !== false){
				$result = $upsert->getResult();
			} else{
				$result = $upsert->getLastError();
			}
		} catch(Exception $e){
			$result = $e->getMessage();
		}
	}

?>

<!doctype html>

<html lang="en">
<head>

    <meta charset="utf-8">

    <title>Moni Funding Test</title>
    <meta name="description" content="Moni Funding">
    <meta name="author" content="SableCRM+">

    <style>

        #response {
            border: .1em solid grey;
            width: 80%;
            min-height: 50%;
            margin: 2em;
        }

    </style>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

</head>

<body>

<form method="post">

    <div id="auth container">
        <label for="username">Username</label>
        <select name="username" id="username">
            <option value="guardme_wsi">GuardMe</option>
            <option value="phtsable_wsi">Power Home</option>
        </select>

        <label for="password">Password</label>
        <select name="password" id="password">
            <option value="Zohomaster4253">GuardMe</option>
            <option value="power5342">Power Home</option>
        </select>
    </div>

    <div id="data container">
        <label for="cs_number">Cs Number</label>
        <input type="number" name="cs_number" id="cs_number">

        <label for="contract_id">Contract Id</label>
        <input type="number" name="contract id" id="contract_id">
    </div>

    <div id="control container">
        <input type="submit" name="submit">
    </div>

    <div id="response">

		<?php print_r($result) ?>

    </div>

</form>

<script></script>

</body>
</html>