<?php

session_start();

if(isset($_POST["new-sale"])){
	unset($_SESSION["customer-info"]);
	unset($_SESSION["deal-id"]);
	unset($_SESSION["contact-id"]);
	unset($_SESSION["new-account"]);
	unset($_SESSION["post-variables"]);

	echo"session successfully cleared";
}
else{
	session_destroy();
}
