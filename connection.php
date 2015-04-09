<?PHP
	session_start();

	$user='alice';
	$pass='123';
	$bdd = array();

	while ($line = file("/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd"))
		$bdd  = implode(':', $line);
	
	foreach($bdd as $elem){
		echo "$elem\n";
	}
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
	require_once('includes/connection.html');
?>
