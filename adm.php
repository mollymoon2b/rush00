<?PHP
	session_start();
	if ($_SESSION['rangUser'] === "0"){
		require_once('includes/layout.html');
	} else {
		header('location: index.php');
	}
?>