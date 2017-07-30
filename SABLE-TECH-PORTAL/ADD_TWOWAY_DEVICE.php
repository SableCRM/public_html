<?php

session_start();

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');

function AddTwoway($panelType, $csNumber)
{
    require_once '../../Integration/apiendpoints.php';
    require_once '../../Integration/post.php';
    require_once '../../Integration/MONITRONICS-API/GET-DATA/getdata.php';
    
    $post = new Post($endpoint['moni'], $actionendpoint['moni']);
    $getData = new GetData($_SESSION['user']->MONI_USER, $_SESSION['user']->MONI_PASSWORD);
    
    /**
     * get xml for a sitesystems request from moni api using cs number and store result into $siteSystemsXml variable
     */
    $siteSystemsXml = $getData->Get('SiteSystems', $csNumber);
    
    /**
     * post sitesystems request xml to moni api and store result into $siteSystemsResult variable
     */
    $siteSystemsResult = $post->Post('GetData', $siteSystemsXml, 'array');
    /**
     * if site is pending install, run code in if condition
     */
    if(trim($siteSystemsResult[0]->sitestat_id) == 'P' || trim($siteSystemsResult[0]->sitestat_id) == 'P2')
    {
        require_once('../../Integration/MONITRONICS-API/IMMEDIATE/immediate.php');
        
        /**
         * create instance of moni api Immediate functions object and initialize it with username and password and store
         * it into $twowayObj variable
         */
        $twowayObj = new Immediate($_SESSION['user']->MONI_USER, $_SESSION['user']->MONI_PASSWORD);
        
        /**
         * set the panel type for the $twowayObj
         */
        $twowayObj->panel = $panelType;
        
        /**
         * get xml for a twoway request from moni api using cs number and store result into $twowayXml variable
         */
        $twowayXml = $twowayObj->Set('Twoway', $csNumber);
        
        /**
         * post twoway device, request xml to moni api to add twoway device to account
         */
        $post->Post('Immediate', $twowayXml, 'json');
        
        /**
         * post sitesystems request xml to moni api and store result into $siteSystemsResult variable
         */
        $siteSystemsResult = $post->Post('GetData', $siteSystemsXml, 'array');
        
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

/**
 * call add twoway function and pass panel type and cs number
 */
AddTwoway($_POST['panel-type'], $_POST['cs-number']);