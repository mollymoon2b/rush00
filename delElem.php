<?PHP
	session_start();
	if (isset($_SESSION['username']) && ($_SESSION['rangUser'] == "0") && (isset($_GET['delElem']))){
		if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'r+')){
			$tabUser = array();
			$delElem = $_GET['delElem'];
			if ($delElem === "franck" || $delElem === "alice")
				header('location: adm.php');
			while (($buffer = fgets($f, 4096)) !== false) {
				$user = explode(":", $buffer);
				if (!($delElem === "$user[1]")){
					array_push($tabUser, $user);
				}
			}
			fclose($f);
			require_once('includes/layout.html');
			if (isset($_POST['submit'])){
				if ($_POST['elemDel'] === $delElem){
					if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'w')){
						foreach($tabUser as $data)
							fputcsv($f, $data, ":");
					}
					fclose($f);
					header('location: adm.php');
				} else {
					echo "invalide";
				}
			}
		}

	}

?>