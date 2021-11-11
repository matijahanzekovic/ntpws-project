<?php
	session_start();

	include("dbconnection.php");

    if (isset($_GET['menu'])) { 
		$menu = (int)$_GET['menu']; 
	}
	if (isset($_GET['action'])) { 
		$action = (int)$_GET['action']; 
	}
	
    if(!isset($_POST['_action_'])) {
		$_POST['_action_'] = FALSE;  
	}
	
	if (!isset($menu)) { 
		$menu = 1; 
	}

	print '
		<!DOCTYPE HTML>
		<html>
			<head>
				<title>Programiranje web aplikacija</title>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				<meta name="description" content="">
				<meta name="keywords" content="">
				<meta name="author" content="Matija Hanžeković">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
				<link rel="stylesheet" href="style.css">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
				<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
			</head>
			<body>
				<main>';
					if (isset($_SESSION['message'])) {
						print $_SESSION['message'];
						unset($_SESSION['message']);
					}
					
					if (!isset($_GET["menu"]) || $_GET["menu"] == 1) {
						include("home.php");
					} else if ($_GET["menu"] == 2) {
						include("news.php");
					} else if ($_GET["menu"] == 3) {
						include("contatct.php");
					} else if ($_GET["menu"] == 4) {
						include("about.php");
					} else if ($_GET["menu"] == 5) {
						include("gallery.php");
					} else if ($_GET["menu"] == 6) {
						include("register.php");
					} else if ($_GET["menu"] == 7) {
						include("login.php");
					} else if ($_GET["menu"] == 8) {
						include("admin.php");
					}
				
				print '	
				</main>	
			<body>	
		</html>';

?>