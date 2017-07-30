<?php

	use MoniWsi\ClassMap;
	use MoniWsi\ServiceType\Get;
	use MoniWsi\StructType\GetData;
	use WsdlToPhp\PackageBase\AbstractSoapClientBase;

	require_once '../wsdl2php_generated/vendor/autoload.php';
//
//	$username = "guardme2012";
//
//	$password = "SABLECRm1997";
//
//	$customerId = 5263939;
//
//	$result = false;
//
//	$options = array(
//		\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://alarmadmin.alarm.com/WebServices/CustomerManagement.asmx?wsdl',
//		\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \CustomerManagement\ClassMap::get(),
//	);
//
//	$get = new \CustomerManagement\ServiceType\Get($options);
//	$get->setSoapHeaderAuthentication(new \CustomerManagement\StructType\Authentication($username, $password));
//
//	if ($get->GetFullEquipmentList(new \CustomerManagement\StructType\GetFullEquipmentList($customerId)) !== false)
//	{
//		$result = $get->getResult();
//	}
//	else
//	{
//		$result = $get->getLastError();
//	}
//
////	foreach($result->getGetFullEquipmentListResult()->getPanelDevice() as $device)
////	{
////		echo $device->getWebSiteDeviceName()."</br>";
////	}
//
//	echo "<pre>";print_r($result->getGetFullEquipmentListResult()->getPanelDevice());echo "</pre>";


	//$options = false;

	$productionUrl = "https://mimasweb.monitronics.net/MIDI/MIDI.asmx?wsdl";

	$testUrl = "http://senti.monitronics.net/midi/midi.asmx?wsdl";

	$username = "guardme_wsi";

	$password = "Zohomaster4253";

	$testUsername = "guardmetestwsi";

	$testPassword = "password";

	$dealerId = "813210002";

	$customerNumber = null;

	$xMLData = null;

	$result = false;

	$get = false;

	$entity = "contypes";

	$options = array(
		AbstractSoapClientBase::WSDL_URL      => $productionUrl,
		AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get()
	);

	// create an instance of the create class.
	$get = new Get($options);

	if($get->GetData(new GetData($entity, $username, $password, $customerNumber, $xMLData)) !== false){
		$result = $get->getResult()->getGetDataResult();
	} else{
		$result = $get->getLastError();
	}

	//print_r($result);
	echo "<pre>";
	print_r($result);
	echo "</pre>";

	//	public function getWebServiceVersion()
	//{
	//	if($this->get->GetWebServiceVersion(new \MoniWsi\StructType\GetWebServiceVersion()) !== false)
	//	{
	//		$this->result = $this->get->getResult();
	//	}
	//	else
	//	{
	//		$this->result = $this->get->getLastError();
	//	}
	//
	//	return $this->result;
	//}