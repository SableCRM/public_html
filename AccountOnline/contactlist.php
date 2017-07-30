<?php

function MoniContactList($source = false)
{
    switch ($source)
    {
        case 'monitronics':
            $_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_POST['deal_id'], 'array');

  	        $xml = $_SESSION[GetData]->Get('Contacts', $_SESSION[Deal]['CS Number']);
	        die($_SESSION[Post]->Post('GetData', $xml, 'json'));
	        break;

        case 'database':
            break;
    }
}