<?php
	unset($_POST);
	unset($_SESSION['user']);

	header("Location: index.php?menu=1");
	exit;
?>    