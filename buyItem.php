<?PHP
	session_start();
	require_once('includes/layout.html');
	if (isset($_POST['submit']) && intval($_POST['qtsArt']) <= intval($_GET['qts'])){
		if (isset($_SESSION['panier'])){
			$_SESSION['panier'] = array();
		}
		$tmp = $_SESSION['panier'];
		$data = array($_POST['qtsArt'], $_GET['name'], $_GET['bdd'], $_GET['idItem']);
		array_push($tmp, $data);
		$_SESSION['panier'] = $tmp;
		print_r($_SESSION);
		// header('location: panier.php');
	}
?>