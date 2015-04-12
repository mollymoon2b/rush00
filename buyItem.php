<?PHP
	session_start();
	require_once('includes/layout.html');
	if (isset($_POST['submit']) && intval($_POST['qtsArt']) <= intval($_GET['qts'])){
		if (!isset($_SESSION['panier'])){
			$_SESSION['panier'] = array();
		}
		$data = array($_POST['qtsArt'], $_GET['name'], $_GET['bdd'], $_GET['idItem'], $_GET['pixItem']);
		array_push($_SESSION['panier'], $data);
		header('location: panier.php');
	}
?>