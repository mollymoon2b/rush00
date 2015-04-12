<?PHP
	session_start();
	if (isset($_SESSION['username'])) {
		require_once('includes/layout.html');
		print_r($_POST);
		if (isset($_POST['submit'])){
			if(($_POST['nameArt'] != "") && (intval($_POST['prixArt']) > 0) && ($_POST['descArt'] != "") && (intval($_POST['qtsArt'] > 0)) && $_POST['catArt'] != ""){
				$bdd = $_POST['catArt'];
				$bdd = $bdd.".csv";
				echo "$bdd";
				if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/'.$bdd, 'r+')) {
				// if ($f = fopen('/Applications/MAMP/htdocs/bdd/produit.csv', 'r+')){
					$index = 0;
					while (($buff = fgetcsv($f, 4096, ":")) !== false){$index++;if($buff[0])$back = $buff[0];}
					echo "[$back  et [$index]";
					if ($index != 0)
						$index = intval($back);
					$index++;
					$data = array($index, $_SESSION['username'],$_POST['qtsArt'], $_POST['nameArt'], $_POST['prixArt'], $_POST['descArt']);
					fputcsv($f, $data, ":");
					fclose($f);
				}
			}
			// header('location: index.php');
		}
	} else {
		header('location: index.php');
	}
?>