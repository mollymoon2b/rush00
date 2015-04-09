<?php
 	session_start();

		if(isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = $_POST['password'];

					if ($username&&$password){
					 
						$data = array(array($line, $username, $password)); //$Line++ pour modif les id
						$line++;
						if ($f = @fopen('bdd/user.csv', 'a=')) {
						  foreach ($data as $ligne) {
						    fputcsv($f, $ligne);
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
?>
<html>
<head>

</head>
<body>
	<h1>Administration - Connexion</h1>
	<form action="" method="POST">
		<h3>Pseudo :</h3> <input type="text" name="username"> <br>
		<h3>Mot de pass :</h3> <input type="password" name="password"> <br>
		<input type="submit" name="submit">
	</form>
	</body>
</html>