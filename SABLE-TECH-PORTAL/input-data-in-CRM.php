<?php

session_start();

/**
 * Created by PhpStorm.
 * User: razaman
 * Date: 2/24/2017
 * Time: 3:37 PM
 */

require_once '../../Integration/ZOHO-API/zoho.php';
require_once '../../Integration/apiendpoints.php';
require_once '../../Integration/DATABASE_CONNECTION.php';

$zoho = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);

if($_POST['adc']){
    $MONITORING_COMPANY = 'moni';
    
    require_once '../../Integration/ADC-API/ADC-CLASS.php';
    
    $deal = $zoho->Get('Potentials', $_SESSION['selected-job'], 'array');
    
    if($deal['Monitoring Center'] == 'Rapid'){
        $MONITORING_COMPANY = 'rapid';
    }
    
    $query = 'SELECT ALARM_COM_USER, ALARM_COM_PASSWORD FROM ALARM_COM_USER WHERE COMPANY_ID = ? AND MONITORING_COMPANY = ?';
    $params = array($_SESSION['user']->COMPANY_ID, $MONITORING_COMPANY);
    $ALARM_COM_USER = Connect($query, $params, 'array')[0];
    $adc = new ADC($ALARM_COM_USER->ALARM_COM_USER, $ALARM_COM_USER->ALARM_COM_PASSWORD, $endpoint['adc'], $actionendpoint['adc']);
    
    if($_POST['adc-create']){
        $deal['ADC Serial Number'] = $_POST['serial-no'];
        $result = $adc->Create($deal, 'array');
        
        if($result['Success'] == 'true'){
            $zoho->Set('Potentials', $_SESSION['selected-job'], '{"ADC Customer Id":"'.$result['CustomerId'].'"}');
        }
        
        array_push($result, $deal['Contact Name']);
        array_push($result, $deal['Address']);
        array_push($result, $deal['City']);
        array_push($result, $deal['State']);
        /**
         * @todo, need to make the email the company contact email, pulled from company table in database.
         */
        mail('operations@guardme.com', 'Cell Registration', json_encode($result));
        die(json_encode($result));
    }
    
    elseif($_POST['adc-zones']){
        die($adc->GetZones($deal, 'json'));
    }
}

elseif($_POST['crm']){
    if($_POST['update-crm']){
        die($zoho->Set('Potentials', $_SESSION['selected-job'], $_POST['data']));
    }
}

/**
 * @todo, need to refactor eventhistory operations to provide better event filtering.
 */
elseif($_POST['action']){
    include_once '../../Integration/MONITRONICS-API/GET-DATA/getdata.php';
    include_once '../../Integration/post.php';
    $events = new GetData($_SESSION['user']->MONI_USER, $_SESSION['user']->MONI_PASSWORD);
    $post = new Post($endpoint['moni'], $actionendpoint['moni']);
    $events->start_date = $_POST['start-date'];
    $events->end_date = $_POST['end-date'];
    $eventsResult = $post->Post('GetData', $events->Get('eventhistories', $_POST['cs-number']), 'array');
    
    $query = 'INSERT INTO EVENT_HISTORY (deal, cs_no, event_date, zone_id, area, event_id, user_name, zonestate_id, match_id, computed)
            VALUES(?,?,?,?,?,?,?,?,?,?)';
    
    if($eventsResult){
        foreach($eventsResult as $result){
            $params = array(
                $_POST['cs-number'], $result->cs_no, $result->event_date, $result->zone_id, $result->area, $result->event_id,
                $result->user_name, $result->zonestate_id, $result->match, $result->computed
            );
            Connect($query, $params, 'array');
        }
    }
    
    if($_POST['action'] == 'sort-events'){
        $query = ('SELECT * FROM EVENT_HISTORY WHERE deal = ? ORDER BY ? ASC');
        $params = array($_POST['cs-number'], $_POST['event-filter']);
    }
    
    else{
        if($_POST['action'] == 'zone-highlight'){
            $query = ('SELECT DISTINCT zone_id FROM EVENT_HISTORY WHERE deal = ? AND zonestate_id = "A" AND zone_id > 0  ORDER BY event_date DESC');
        }
        
        else{
            $query = ('SELECT * FROM EVENT_HISTORY WHERE deal = ? AND zonestate_id = "A" AND zone_id > 0  ORDER BY event_date DESC');
        }
        $params = array($_POST['cs-number']);
    }
    
    $row = Connect($query, $params, 'json');
    
    $query = "DELETE FROM EVENT_HISTORY WHERE deal = ?";

    $params = array($_POST['cs-number']);
    Connect($query, $params, 'array');
    
    die($row);
}