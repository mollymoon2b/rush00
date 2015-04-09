<?php
 	session_start();

	if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$delimiter = ':';
			if ($username&&$password){
					 
				$data = array(array($line, $username, $password)); //$Line++ pour modif les id
				$line++;
				if ($f = @fopen('bdd/user.csv', 'a=')) {
					 foreach ($data as $ligne) {
					   fputcsv($f, $ligne, $delimiter);
					   }
				  fclose($f);
				  }
			else {
				 echo "Impossible d'acc&eacute;der au fichier.";
				  }
			}else{
				echo "Veuillez remplir tous les champs";
			}
		}
		require_once('includes/inscription.html');
?>