<?php

	require_once "../wsdl2php_generated/vendor/autoload.php";

	use Credit\app\credit\pullNewCredit;
	use Credit\app\credit\pullPrevCredit;

//	$client = [
//		"token" => "R8YErzfQnyK03s4TVH05zprOsiGU5edCjkY99701mHkS3n0Cg1JpSFNsIBTWaxsIE4hfYNIspFwubGXs8VO+JNmmG0uH+1Ut+y3cfeM5E8qjzQ==",
//		"username" => "GU@RDMEm0ni",
//		"password" => "uV9CtPlvE74*NTdpTBxb"
//	];

	$client = [
		"username"    => "GU@RDMEm0ni",
		"password"    => "uV9CtPlvE74*NTdpTBxb",
		"bureau"      => "TU",
		"lastname"    => "Bizzi",
		"firstname"   => "John",
		"address"     => "652 Elm Ave",
		"city"        => "Teaneck",
		"state"       => "NJ",
		"zip"         => "07152",
		"dateOfBirth" => "03/29/1985",
		"ssn"         => "000-00-0000"
	];

//	$previousCredit = new pullPrevCredit($client);
//
//	try
//	{
//		print_r($result = $previousCredit->pullPrev()->getTty());
//	}
//	catch(Exception $e)
//	{
//		print_r($e->getMessage());
//	}

	$newCredit = new pullNewCredit($client);

	print_r($newCredit->pullNew()->getScore());
