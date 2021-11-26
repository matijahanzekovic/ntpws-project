<?php

	session_start();

	$url = "localhost";
	$username = "root";
	$password = "";
	$database = "ntpws";

	$db = mysqli_connect($url, $username, $password, $database) or die('Error connecting to MySQL server.');

	$_SESSION['db'] = $db;

?>
