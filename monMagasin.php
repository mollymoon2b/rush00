<?PHP
	session_start();
	if (isset($_SESSION['username'])) {
		require_once('includes/layout.html');
		if (isset($_POST['submit'])){
			if(($_POST['nameArt'] != "") && (intval($_POST['prixArt']) > 0) && ($_POST['descArt'] != "") && (intval($_POST['qtsArt'] > 0))){
				// if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/produit.csv', 'r+')) {
				if ($f = fopen('/Applications/MAMP/htdocs/bdd/produit.csv', 'r+')){
					while (($buff = fgets($f, 4096)) !== false) $index = intval(explode(":", $buff)[0]);
					$index++;
					$data = array($index, $_SESSION['username'],$_POST['qtsArt'], $_POST['nameArt'], $_POST['prixArt'], $_POST['descArt']);
					fputcsv($f, $data, ":");
					fclose($f);
				}
			}
			header('location: index.php');
		}
	} else {
		header('location: index.php');
	}
?>