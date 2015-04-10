<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = hash("whirlpool", $_POST['password']);
		if ($username&&$password){
			if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'r+')) {
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
    				$data = array($index, $username, $password, "osef");
    				fputcsv($f, $data, ":");
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
?>