
<?php

session_start();
if(!(isset($_SESSION['username']))){
	
	// remove all session varibles
	session_unset();
	// destroy the session
	session_destroy();
	header("Location: login");
}

?>