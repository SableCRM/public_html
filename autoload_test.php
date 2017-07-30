<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 4/30/2017
	 * Time: 12:10 PM
	 */

	require_once "../SableCRM+/vendor/autoload.php";

	use Sable\Users;
	use Sable\Database;

	$adminUser = new Users\AdminUser("razaman2", "$@B!3crm+");

	$adminUser->setFirstName("Ainsley");

	$adminUser->setLastName("Clarke");

	$rows = false;
	$dbConn = new Database\Connection();
	$sql = $dbConn->prepare("SELECT * FROM USR");
	$sql->execute(null);
	if($sql->rowCount() > 0){
		$rows = $sql->fetchAll(PDO::FETCH_OBJ);
	} else {
		echo "No data was found for query...";
	}

	echo"<pre>";print_r($rows);echo"</pre>";

	//var_dump($adminUser);