<?php
	$url = $_SERVER['HTTP_HOST'];

	$rest = preg_replace("/rush00.local.42.fr:8080/", "", $url);
	echo "$rest\n";
	$ACTION[$url."/admin"];
	require_once('includes/header.php');
	require_once('includes/footer.php');
 ?>