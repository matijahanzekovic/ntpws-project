<?php

	define('__APP__', TRUE);

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

	function resolvePage() {
		if (!isset($_GET["menu"]) || $_GET["menu"] == 1) {
			include("home.php");
		} else if ($_GET["menu"] == 2) {
			include("news.php");
		} else if ($_GET["menu"] == 3) {
			include("contact.php");
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
		} else if ($_GET["menu"] == 9) {
			include("weather.php");
		} else if ($_GET["menu"] == 10) {
			include("logout.php");
		}
	}

?>

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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	<body>
		<header>
			<div class="header-img"></div>
			<?php include("navigation.php"); ?>
		</header>
		<main>
			<?php resolvePage(); ?>	
		</main>	
		<footer class="navbar navbar-expand-sm bg-primary">
			<p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
		</footer>
	<body>	
</html>
