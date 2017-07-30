<?php

	use BounceApi\Match;
	use BounceApi\SearchInfo;

	require_once "../BounceApi/vendor/autoload.php";
	require_once "../Integration/post.php";

	//header("Content-Type: text/xml");

	$chris = new SearchInfo();

	$chris->setFirstName("Chris");
	$chris->setLastName("Soda");
	$chris->setAddress1("4404 Morning Song Dr");
	$chris->setCity("Fort Worth");
	$chris->setState("TX");
	$chris->setZip("76244");
	$chris->setProcessName("CreditCheck");
	$chris->setApplicationName("SableCRM+");
	$chris->setDealerNumber("813210002");
	$chris->setDealerName("GuardMe Security");

	$match = "http://tempuri.org/IBouncer/Match";

	//print_r((new Match($chris))->getXml()); exit;

	print_r(request((new Match($chris))->getXml(), $match));

	//$post = new Post("https://ws.monitronics.net/BounceServiceR2/wwwBouncer.svc", $match);

	//print_r($post->Post("Match/", (new Match($chris))->getXml()));

	function request($xml, $action)
	{
		$ch = curl_init("https://ws.monitronics.net/BounceServiceR2/wwwBouncer.svc");

		curl_setopt($ch, CURLOPT_VERBOSE, true);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$headers = ["Content-Type: text/xml", "SOAPAction: ".$action];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=".$xml);

		curl_setopt($ch, CURLOPT_POST, true);

		$response = curl_exec($ch);

		curl_close($ch);

		return $response;
	}
