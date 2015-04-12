<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			if (isset($_POST['password']))
				$password = hash("whirlpool", $_POST['password']);
			if ($username && $password){
				if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'r+')) {
				// if ($f = fopen('/Applications/MAMP/htdocs/bdd/user.csv', 'r+')){
					$end = 1;
					while ($end && ($buffer = fgets($f, 4096)) !== false) {
	        			$info = explode(":", $buffer);
	        			if ($info[1] == $username){
	        				$end = 0;
	        				echo "Utilisateur deja existant";
	        			}
	    			}
	    			if ($end == 1){
	    				$index = intval($info[0]);
	    				$index++;
	    				$data = array($index, $username, $password, "5");
	    				fputcsv($f, $data, ":");
	    				$_SESSION['username'] = $username;
	    				header('location: index.php');
	    			}
				  	fclose($f);
				}
				else {
				 echo "Impossible d'acc&eacute;der au fichier.";
				}
			} else {
				echo "Veuillez remplir tous les champs";
			}
		}
		require_once('includes/layout.html');
	} else {
		header('location: index.php');	
	}
?>