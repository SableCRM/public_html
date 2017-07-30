<?php

session_start();

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');

function SiteTest($csNumber)
{
    require_once '../../Integration/apiendpoints.php';
    require_once '../../Integration/post.php';
    $post = new Post($endpoint['moni'], $actionendpoint['moni']);
    
    //GET SITE SYSTEM INFORMATION FOR ACCOUNT
    getdata:
    require_once '../../Integration/MONITRONICS-API/GET-DATA/getdata.php';
    $getData = new GetData($_SESSION['user']->MONI_USER, $_SESSION['user']->MONI_PASSWORD);
    
    $sitesystemsXml = $getData->Get('SiteSystems', $csNumber);
    
    $sitesystemsXmlResult = $post->Post('GetData', $sitesystemsXml, 'array');
    
    if($site == true)
    {
        die(json_encode($sitesystemsXmlResult));
    }
    
    //CHECK SYSTEM TEST STATUS
    if($_POST['state'] == 'On')
    {
        if($sitesystemsXmlResult[0]->ontest_flag == 'no')
        {
            start:
            
            require_once('../../Integration/MONITRONICS-API/IMMEDIATE/immediate.php');
            
            $test = new Immediate($_SESSION['user']->MONI_USER, $_SESSION['user']->MONI_PASSWORD);
            
            $test->testState = $_POST['state'];
            
            $test->testCat = $_POST['testCat'];
            
            $test->hour = $_POST['hr'];
            
            $test->minute = $_POST['min'];
            
            $siteTestXml = $test->Set('OnTest', $csNumber);
            
            $post->Post('Immediate', $siteTestXml, 'json');
            
            $site = true;
            
            goto getdata;
        }
        
        else
        {
            die('{"error":"SYSTEM IS ALREADY ON TEST UNTIL '.$sitesystemsXmlResult[0]->ontest_expire_date.'."}');
        }
    }
    
    elseif($_POST['state'] == 'Off')
    {
        if($sitesystemsXmlResult[0]->ontest_flag == 'yes')
        {
            goto start;
        }
        
        else
        {
            die('{"error":"SYSTEM IS ALREADY OFF TEST."}');
        }
    }
}

/**
 * call site test function and pass cs number
 */
SiteTest($_POST['cs-number']);