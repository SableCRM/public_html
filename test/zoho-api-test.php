<?php
/**
 * Created by PhpStorm.
 * User: razam
 * Date: 3/13/2017
 * Time: 2:12 PM
 */

require_once '../../Integration/ZOHO-API/zoho.php';
require_once '../../Integration/DATABASE_CONNECTION.php';

$sql = 'SELECT ZOHO_AUTH_ID FROM ZOHO_USER WHERE COMPANY_ID = ?';

$params = array($_GET['companyId']);

$authToken = Connect($sql, $params, 'array');

$zoho = new Zoho($authToken[0]->ZOHO_AUTH_ID);

//$result = $zoho->Insert('contacts', json_encode(array(
//    'Country Zbooks' => 'Anywhere',
//    'First Name' => 'Sable Crm+',
//    'Last Name' => 'Test Program',
//    'Email' => 'sablecrm@test.now',
//    'Phone' => 2012012011,
//    'Mobile' => 7327327322,
//    'Phone 2' => 9739739733,
//    'Phone Work' => 8458458455,
//    'Mailing Street' => '31 elf road',
//    'Mailing City' => 'Zohotown',
//    'Mailing State' => 'EG',
//    'Mailing Zip' => '01154',
//    'Mailing County' => 'Programming',
//    'Mailing Country' => 'Russia',
//    'Credit Score' => 510,
//    'Credit Token' => 'Token Of Credit',
//    'Transaction Number' => 'Numbre De Transaction',
//    'Account Name' => 'Zoho API Contact Test',
//    'Title' => 'De Heavyweight Title',
//    'Social Security Number' => '000-000-0000',
//    'Monitoring Center' => 'Dont Know As Yet',
//    'CS Number' => '768884528'
//)));


$result = $zoho->Insert('Deals', json_encode(array(
    'Deal Name' => 'Rediculous Deal',
    'Residential/Commercial' => 'Residential',
    'Stage' => 'Lead',
    'Closing Date' => time()
)));

print_r(json_decode($result));
print_r(json_decode($result)->response->result->recorddetail->FL[0]->content);

