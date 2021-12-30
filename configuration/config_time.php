<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

function login_validate()
{
	error_reporting(0);
	include 'configuration/config_connect.php';

	$sessiontime = "";

	$queryback = "SELECT * FROM backset";
	$resultback = mysqli_query($conn, $queryback);
	$rowback = mysqli_fetch_assoc($resultback);
	$sessiontime;


	if ($sessiontime != null || $sessiontime != "" || $sessiontime != 0 || $sessiontime != "" || $sessiontime > 0) {
		$sessiontime = $sessiontime * 60;
		$timer = $sessiontime;
	} else {
		$timer = 3600;
	}

	$_SESSION["expires_by"] = time() + $timer;
}
function login_check()
{
	$exp_time = $_SESSION["expires_by"];
	if (time() < $exp_time) {
		login_validate();
		return true;
	} else {
		unset($_SESSION["expires_by"]);
		return false;
	}
}
