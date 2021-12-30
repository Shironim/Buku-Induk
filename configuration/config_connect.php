<?php

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "root";
$password = "";
$dbname="binduk";

    //   $koneksi = mysqli_connect('localhost', 'root', '');
    //     $db = mysqli_select_db('binduk');

	// Create connection
	global $conn;
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
