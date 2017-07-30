<?php
//print_r($_POST);
require_once 'createsend-php-master/csrest_subscribers.php';

$apiKey = '35bf35343f70c8d95c78c595866d10cbf3556d53f00a01fb'; // move to safe place later
$auth = array('api_key' => $apiKey);

// Get variables from Zoho script
    $subscribeListId = [];

    $unsubscribeListId = [];

    $dealOwner = false;

    $listId = $_POST["subListIds"];

	/**
	 * all valid list id's for campaign monitor
	 */
    $campaignMonitorLists = [

    	"bought from another" => "cd602e30546883e83a032e2e3daa45a8",

	    "new customer"        => "e43b1abe890bbc85ee2aab3f4b772e2f",

	    "ppc lead"            => "19b75fc142de064079a8245a6cd6671b",

	    "adc lead"            => "0619f74553040107b2d8e8203aa3da72",

	    "moni lead"           => "1ba5e4d25309ce44e162ce56eb7db33d",

	    "dns"                 => "69e0cf2f6a7e14aec99f01b97105b06c",

	    "sold not installed"    => "d9b81c73a9224bce1be37eb1412c2803"
    ];

    if(!empty($listId) || !is_null($listId))
    {
	    if(strtolower($listId) == "unsubscribe")
	    {
		    addToUnsubscribeList();
	    }
	    else
	    {
		    array_push($subscribeListId, $campaignMonitorLists[strtolower($listId)]);
	    }

	    switch(strtolower($listId))
	    {
		    case "new customer":
			    $dealOwner = $_POST["dealOwner"];
			    addToUnsubscribeList();
			    break;

		    case "dns":
			    $dealOwner = $_POST["dealOwner"];
			    addToUnsubscribeList();
			    break;

		    case "bought from another":
			    addToUnsubscribeList();
			    break;

		    case "sold not installed":
			    addToUnsubscribeList();
			    break;
	    }
    }

$email = $_POST["email"]; // string

$name = $_POST["firstname"]." ".$_POST["lastname"]; // string

$subListIds = $subscribeListId; // array

$unsubListIds = $unsubscribeListId; // array

// If 1 or more listIds in array, iterate and add to/remove user from given list/s
if (count($unsubListIds) > 0) {

    foreach ($unsubListIds as $unsubListId) {

        $wrap = new CS_REST_Subscribers($unsubListId, $auth);
        $result = $wrap->unsubscribe($email);
    }
}

if (count($subListIds) > 0) {

    foreach ($subListIds as $subListId) {

        $wrap = new CS_REST_Subscribers($subListId, $auth);
        $result = $wrap->add([
	        "EmailAddress" => $email,
	        "Name"         => $name,
	        "CustomFields" => [
	            [
		            "Key"   => "Deal Owner",
		            "Value" => $dealOwner
	            ]
            ]
        ]);

        print_r($result);
    }
}

	/**
	 * unsubscribes client from all lists
	 */
function addToUnsubscribeList(){

	global $unsubscribeListId;

	global $campaignMonitorLists;

	foreach($campaignMonitorLists as $list){

		array_push($unsubscribeListId, $list);
	}

}