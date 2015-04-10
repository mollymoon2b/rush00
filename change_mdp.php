<?php
if ($_POST['username'] === "" || $_POST['oldpw'] === "" || $_POST['newpw'] === "" || $_POST['submit'] !== "OK")
{
	echo "ERROR\n";
	return;
}
$oldpw = hash("whirlpool", $_POST['oldpw']);
$newpw = hash("whirlpool", $_POST['newpw']);
if (file_exists("bdd/user.csv"))
{
	$to_cmp = file_get_contents("bdd/user.csv");
	$to_cmp = unserialize($to_cmp);
	foreach ($to_cmp as &$account) {
		if ($account['login'] == $_POST['login'])
		{
			if ($account['password'] == $oldpw)
				{
					$account['password'] = $newpw;
					echo "OK\n";
					file_put_contents("bdd/user.csv", serialize($to_cmp));
					return;
				}
		}
	}
}
echo "failed";
require_once('change_mdp.html');
?>
