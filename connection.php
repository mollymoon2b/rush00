<?PHP
	if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = hash("whirlpool", $_POST['password']);
		if ($username && $password){
			if ($f = fopen('/nfs/zfs-student-2/users/2013/folier/mamp/apps/rush00/htdocs/bdd/user.csv', 'r+')){
				$end = 1;
				while ($end && ($buffer = fgets($f, 4096)) !== false) {
        			$info = explode(":", $buffer);
        			if ($info[1] == $username){
        				if ($password === $info[2]){
        					session_start();
        				} else {
        					echo "mdp faux";
        				}
        				$end = 0;
        			}
    			} if ($end == 1)
    				echo "invalide login";		
			}
			fclose($f);
		}else{
			echo "Veuillez saisir tous les champs";
		}
	}
	require_once('includes/layout.html');
?>
