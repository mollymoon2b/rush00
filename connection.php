<?PHP
	session_start();

	$user='alice';
	$pass='123';

		if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username&&$password){
			if ($password==$pass&&$username==$user){
				$_SESSION['username'] = $username;
				header('Location: admin/admin.php');

			}else{
				echo "Mauvais Identifiants";
			}
		}else{
			echo "Veuillez saisir tous les champs";
		}
	}
	require_once('includes/connection.html');
?>
