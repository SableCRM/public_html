<?php

	use Helpers\helpers\classes\Deal;
	use Leaderboard\classes\LeaderboardDb;

	function Online()
	{
		require_once "../../Integration/Monitronics API/Account Online/accountonline.php";
		require_once dirname(__DIR__, 2)."/vendor/autoload.php";

		$_SESSION['Deal'] = $_SESSION['Zoho']->Get('Potentials', $_POST['deal_id'], 'array');

		$_SESSION['Contact'] = $_SESSION['Zoho']->Get('Contacts', $_SESSION['Deal']['CONTACTID'], 'array');

		$online = new AccountOnline(Credentials::$sable['wsiUsername'], Credentials::$sable['wsiPassword'], $_SESSION['Deal'], $_SESSION['Contact']);

		if(strtolower($_POST['crossStreet']) == '%test%'){
			$result = '[
            {
              "table_name": "SiteGenDisp",
              "entry_id": "NODISP",
              "site_no": "201315871",
              "cs_no": "762045839",
              "err_no": "109040",
              "msg_type": "0",
              "err_text": "Agency requires 7-day no-dispatch, no-dispatch page created",
              "err_date": "2017-03-16T08:21:54.187-05:00"
            },
            {
              "table_name": "SiteOption",
              "entry_id": "Confirm#",
              "site_no": "201315871",
              "cs_no": "762045839",
              "err_no": "199",
              "msg_type": "0",
              "err_text": "Online confirmation #, 45775302; Cell Primary",
              "err_date": "2017-03-16T08:21:54.527-05:00"
            }
        ]';

			die($result);

			//mail('ainsley.clarke@guardme.com', 'Account Online Test Case', $result);
		} else{
			$online->postVariables['crossStreet'] = $_POST['crossStreet'];
			$online->postVariables['dealerId'] = Credentials::$sable['dealerId'];
			$online->postVariables['homePhone'] = $_POST['homePhone'];
			$online->postVariables['panelPhone'] = $_POST['panelPhone'];
			$online->postVariables['panelLocation'] = $_POST['panelLocation'];
			$online->postVariables['transformerLocation'] = $_POST['transformerLocation'];
			$online->postVariables['adcSerial'] = $_POST['adcSerial'];
			$online->postVariables['zones'] = $_POST['zones'];
			$online->postVariables['agencies'] = $_POST['agencies'];
			$online->postVariables['contacts'] = $_POST['contacts'];
			$online->postVariables['centralStation'] = $_POST['centralStation'];
			$online->postVariables['codeword'] = $_POST['passcode'];
			$online->postVariables['map_coord'] = $_GET['map_coord'];
			$online->postVariables['map_page'] = $_GET['map_page'];


			$xml = $online->AccountOnline();
			//mail('ainsley.clarke@guardme.com', 'Account Online Xml Result', html_entity_decode($xml));

			$result = $_SESSION["Post"]->Post("AccountOnline", $xml, "json");
			//mail('ainsley.clarke@guardme.com', 'Account Online Post Result', $result);

			/******************************************************************************************/

			$onlineResults = json_decode($result);

			$deal = new Deal(Credentials::$sable["companyId"]);

//			if(is_array($onlineResults))
//			{
//
//			}
			foreach($onlineResults as $onlineResult){
				if(strtolower($onlineResult->entry_id) == "confirm#"){
					$leaderboard = new LeaderboardDb(Credentials::$sable["companyId"]);
					$leaderboard->addRecord($deal->getDeal($_POST["deal_id"]));
				}
			}
		}

		die($result);
	}
