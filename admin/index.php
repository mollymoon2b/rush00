<?php
	session_start();

	$user='alice';
	$pass='123';

	if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username&&$password){
			if ($password==$pass&&$username==$user){
				$_SESSION['username'] = $username;
				header('Location: admin.php');

			}else{
				echo "Mauvais Identifiants";
			}
		}else{
			echo "Veuillez saisir tous les champs";
		}
	}


?>
<!DOCTYPE html>
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