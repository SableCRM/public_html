<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 5/1/2017
	 * Time: 2:24 AM
	 */

	session_start();

	require_once "../../../Integration/ZOHO-API/zoho.php";
	$zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);