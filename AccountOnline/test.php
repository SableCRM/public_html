<?php 	

  function Test()
   {
       $_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_POST['deal_id'], 'array');//gets a deal from zoho crm using the deal id.
          
        //GET SITE SYSTEM INFORMATION FOR ACCOUNT
        getdata:
            
        $xml = $_SESSION[GetData]->Get('SiteSystems', $_SESSION[Deal]['CS Number']);
        
		$result = $_SESSION[Post]->Post('GetData', $xml, 'array');
        
        if($site)
        {
            die(json_encode($result));
        }
       
        //CHECK SYSTEM TEST STATUS
        if($_POST['state'] == 'On')
        {
            if($result[0]->ontest_flag == 'no')
            {
                start:

	            require_once('../../Integration/Monitronics API/IMMEDIATE/immediate.php');

                $test = new Immediate(Credentials::$sable[wsiUsername], Credentials::$sable[wsiPassword]);//creates an instance of the moni api immediate function and initialize username and password.

                $test->testState = $_POST['state'];
                
                $test->testCat = $_POST['testCat'];
                
                $test->hour = $_POST['hr'];
                
                $test->minute = $_POST['min'];

                $xml = $test->Set('OnTest', $_SESSION[Deal]['CS Number']);//populates the xml for the on test function with the customer data.
                
                $result = $_SESSION[Post]->Post('Immediate', $xml, 'json');//post the on/off test request to moni.
                
                $site = true;
                
                goto getdata;
            }
            
            else
            {
                die('{"error":"System already On Test."}');
            }
        }
        
        elseif($_POST['state'] == 'Off')
        {
            if($result[0]->ontest_flag == 'yes')
            {
                goto start;
            }
            
            else
            {
                die('{"error":"System already off test."}');
            }
        }       
  }