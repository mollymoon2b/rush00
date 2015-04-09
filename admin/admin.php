<?php
 	session_start();

	if (isset($_SESSION['username'])){

		if(isset($_GET['action'])){
			if ($_GET['action'] == 'add'){
				if (isset($_POST['submit'])){
					$title=$_POST['title'];
					$description=$_POST['description'];
					$price=$_POST['price'];

					if ($title&&$description&&$price){
						$limk = mysqli_connect("localhost","root","passlili", "site");
						 
						$result = $link->query("SELECT * FROM products");
						echo "<pre>";
						while ($row = mysqli_fetch_array($result)) {
							print_r($row);
						}
						print_r($result);
						echo "</pre>";

					}else{
						echo "Veuillez remplir tous les champs";
					}
				}
				?>
			<form action="" method="post">
				<h3>Titre</h3><input type="text" name="title">
				<h3>Descritpion</h3><input type="text" name="description">
				<h3>Price</h3><input type="text" name="price">
				<input type="submit" name="submit">
			</form>

			<?php
			}else if ($_GET['action'] == "modify"){

			}else if ($_GET['action'] == "delete"){

			}else{
				die("Une erreur c'est produite");
			}
		}else{
			
		}
	}else{
		header('Location: ../index.php');
	}
?>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<h1> Bienvenue <?php echo $_SESSION['username']; ?></h1>
<a href="?action=add">Ajouter</a>
<a href="?action=modify">Modifier</a>
<a href="?action=delete">Suprimer</a>