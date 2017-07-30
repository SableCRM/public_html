<?php

function Zones()
{
    $_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_POST['deal_id'], 'array');
	
   	$xml = $_SESSION[GetData]->Get('Zones', $_SESSION[Deal]['CS Number']);
	die($_SESSION[Post]->Post('GetData', $xml, 'json'));
}