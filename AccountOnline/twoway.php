<?php	

  function Twoway()
   {
       /**
        * get deal in array format, from crm potentials using deal id
        */
	   $_SESSION['Deal'] = $_SESSION['Zoho']->Get('Potentials', $_POST['deal_id'], 'array');
    
       /**
        * get xml for a sitesystems request from moni api using cs number and store result into $siteSystemsXml variable
        */
	   $siteSystemsXml = $_SESSION['GetData']->Get('SiteSystems', $_SESSION['Deal']['CS Number']);
    
       /**
        * post sitesystems request xml to moni api and store result into $siteSystemsResult variable
        */
	   $siteSystemsResult = $_SESSION['Post']->Post('GetData', $siteSystemsXml, 'array');
    
       /**
        * if site is pending install, run code in if condition
        */
		if(trim($siteSystemsResult[0]->sitestat_id) == 'P' || trim($siteSystemsResult[0]->sitestat_id) == 'P2')
		{
			require_once('../../Integration/Monitronics API/IMMEDIATE/immediate.php');
            
            /**
             * create instance of moni api Immediate functions object and initialize it with username and password and store
             * it into $twowayObj variable
             */
			$twowayObj = new Immediate(Credentials::$sable['wsiUsername'], Credentials::$sable['wsiPassword']);
            
            /**
             * set the panel type for the $twowayObj
             */
			$twowayObj->panel = $_SESSION['Deal']['Panel Type'];
            
            /**
             * get xml for a twoway request from moni api using cs number and store result into $twowayXml variable
             */
			$twowayXml = $twowayObj->Set('Twoway', $_SESSION['Deal']['CS Number']);
            
            /**
             * post twoway device, request xml to moni api to add twoway device to account
             */
			$_SESSION['Post']->Post('Immediate', $twowayXml, 'json');
            
            /**
             * post sitesystems request xml to moni api and store result into $siteSystemsResult variable
             */
			$siteSystemsResult = $_SESSION['Post']->Post('GetData', $siteSystemsXml, 'array');
            
            /**
             * if twoway device was successfully added to account, print success message with added device, else print error
             * message.
             */
			if($siteSystemsResult[0]->twoway_device_id){
                die('{"err_msg":"Successfully Added '.$siteSystemsResult[0]->twoway_device_id.' As Twoway Device To Account."}');
            }
            else{
                die('{"err_msg":"Sable Was Unable To Add Twoway Device. Please Try Again Later."}');
            }
		}
	   else{
		   die('{"err_msg":"System Must Be Pending Install To Add Twoway."}');
	   }
   }