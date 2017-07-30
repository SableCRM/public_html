<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 5/1/2017
	 * Time: 2:24 AM
	 */

	session_start();

	require_once "../../../Integration/ZOHO-API/zoho.php";
	$zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

	$country = false;
	if($_SESSION["customer-info"]["country"] == "US"){

		$country = "USA";
	}
	elseif($_SESSION["customer-info"]["country"] == "CA"){

		$country = "CANADA";
	}

	$createContactResult = $zohoApi->Insert("Contacts",
		json_encode(
			array(
				"Country Zbooks"         => "",
				"First Name"             => $_SESSION["customer-info"]["fname"],
				"Last Name"              => $_SESSION["customer-info"]["lname"],
				"Email"                  => $_SESSION["customer-info"]["email"],
				"Phone"                  => $_SESSION["customer-info"]["phone"],
				"Mobile"                 => "",
				"Phone 2"                => "",
				"Phone Work"             => "",
				"Mailing Street"         => $_SESSION["customer-info"]["address1"],
				"Mailing City"           => $_SESSION["customer-info"]["city"],
				"Mailing State"          => $_SESSION["customer-info"]["state"],
				"Mailing Province"       => $_SESSION["customer-info"]["state"],
				"Mailing Zip"            => $_SESSION["customer-info"]["zip"],
				"Mailing Postal Code"    => $_SESSION["customer-info"]["zip"],
				"Mailing County"         => $_SESSION["customer-info"]["county"],
				"Mailing Country"        => $country,
				"Credit Score"           => $_SESSION["credit"]["score"],
				"Credit Approved"        => $_SESSION["credit"]["approved"],
				"Approval Reason"        => $_SESSION["credit"]["reason"],
				"Credit Token"           => $_SESSION["credit"]["token"],
				"Transaction Number"     => $_SESSION["credit"]["transid"],
				"Account Name"           => "",
				"Title"                  => "",
				"Social Security Number" => $_SESSION["customer-info"]["ssn"],
				"Monitoring Center"      => "",
				"CS Number"              => ""
			)
		)
	);

	$_SESSION["contact-id"] = json_decode($createContactResult)->response->result->recorddetail->FL[0]->content;

	echo $createContactResult;