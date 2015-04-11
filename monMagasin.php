<?PHP
	session_start();
	if (isset($_SESSION['username'])) {
		require_once('includes/layout.html');
		if (isset($_POST['submit'])){
			if(($_POST['nameArt'] != "") && (intval($_POST['prixArt']) > 0) && ($_POST['descArt'] != "")){
				if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/produit.csv', 'r+')) {
					while (($buff = fgets($f, 4096)) !== false) $index = intval(explode(":", $buff)[0]);
					$index++;
					$data = array($index, $_SESSION['username'], $_POST['nameArt'], $_POST['prixArt'], $_POST['descArt']);
					fputcsv($f, $data, ":");
					fclose($f);
				}
				$bddUser = [];
				if ($p = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'r')) {
					while (($buff = fgets($p, 4096)) !== false){
						$tmp = explode(":", $buff);
						if ($tmp[1] === $_SESSION['username']){
							$tab = explode(",", $tmp[4]);
							array_push($tab, $index);
							$tmp[4] = implode(",", $tab);
						}
						array_push($bddUser, $tmp);
					}
				}
				fclose($p);
				if ($p = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'w')) {
					foreach($bddUser as $user) fputcsv($p, $user, ":");
				}
				fclose($p);
			}
		}	
	} else {
		header('location: index.php');
	}
?>