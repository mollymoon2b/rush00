<?PHP
	session_start();
	if (isset($_SESSION['username'])) {
		require_once('includes/layout.html');		
	} else {
		header('location: index.php');
	}
?>