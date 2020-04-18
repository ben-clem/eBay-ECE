<?php

if (!empty($_POST['btn_submit'])) {
	$s_name = $_POST['s_name'];
	$firstname = $_POST['firstname'];
	$id_seller = $_POST['id_seller'];
	$password = $_POST['password'];
	$photo_path = $_FILES['photo_path']['name'];
	$background_path = $_FILES['background_path']['name'];
}


?>

<!DOCTYPE html>
<html>

<head>

	<title> ECEbay - Page d'inscription vendeur </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style type="text/css">
		.topnav {
			background-color: #223843;
			position: absolute;
			top: 0;
			width: 100%;
			left: 0;
			height: 50px;
		}

		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 15px;
		}

		.topnav a:hover {
			background-color: red;
			color: black;
			height: 50px;
		}

		.topnav-right {
			float: right;
			height: 50px;
			display: flex;
		}

		.dropbtn {
			background-color: #223843;
			color: white;
			padding: 16px;
			font-size: 15px;
			border: none;
			height: 50px;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.5);
			background-color: lightgrey;
			min-width: 160px;
			z-index: 1;
			font-size: 10px;
		}

		.dropdown-content a {
			color: black;
			padding: 10px 15px;
			text-decoration: none;
			display: block;
			font-size: 10px;
			height: 30px;
		}

		header {
			display: row;
			background-color: #223843;
			top: 0;
			left: 0;
		}

		.dropdown-content a:hover {
			background-color: rgba(0, 0, 0, 0.1);
			height: 100%;
		}

		.dropdown:hover .dropdown-content {
			display: grid;
		}

		.dropdown:hover .dropbtn {
			background-color: red;
			/* z-index: ;
			z-index: ; */
		}


		.container h3 {
			text-align: center;
		}

		.container {
			display: flex;
			flex-direction: column;
		}

		.container h4 {
			text-align: center;
			color: grey;
		}

		#btn1,
		#btn2 {
			width: 300px;
			height: 40px;
			color: white;
			border-spacing: 0px;
			border-color: black;
		}

		#btn1 {
			background-color: red;
		}

		#btn2 {
			background-color: #223843;
		}

		#btn_group {
			width: 30%;
			display: flex;
			height: auto;
			left: 255px;
			top: 5px;
			border-color: black;
		}

		a #btn2:hover {
			color: red;
		}




		body {
			background-color: #f1f1f1;
			width: 100%;
			height: 100%;
		}


		#footer {
			display: grid;
			background-color: #223843;
			color: white;
			height: 115px;
			position: relative;
			left: 0;
			bottom: 0;
			width: 100%;
		}

		#footer p {
			bottom: -10px;
			left: 10px;
			font-size: 15px;

		}

		#footer h5 {
			left: 20px;
			margin: auto;
			padding: 5px;
			font-size: 10px;
		}

		.clas {
			bottom: 200px;
		}

		body {
			background-color: lightgrey;
			background-size: cover;
		}

		form {
			max-width: 500px;
			padding: 15px;
			margin: 0 auto;
			border-radius: 1.5em;
			background-color: #f2f2f2;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.5);
		}

		form h3 {
			/*font-family: 'Open Sans' , sans-serif;*/
			font-size: 30px;
			font-weight: 600;
			color: #000000;
			margin-top: 10px;
			padding: 20px;
			text-align: center;
			text-transform: uppercase;
			letter-spacing: 4px;
		}

		.copyright {
			font-size: 1em;
			bottom: 10px;
			text-align: center;
			background-color: #223843;
		}

		.form-group {
			align-items: center;
		}

		#btn_submit {
			width: 100px;
			margin-left: 175px;
		}
	</style>
</head>


<body>

	<!-- Navigation -->
	<header class="page-header header container-fluid">
		<div class="topnav">
			<a href="index.html"> <span class="glyphicon glyphicon-home"></span> </a>
			<div class="dropdown">
				<a class="dropbtn" href="achats.php"> Achats </a>
			</div>
			<div class="dropdown">
				<a class="dropbtn" href="categories.html">Categories</a>
			</div>
			<div class="topnav-right">
				<div class="dropdown">
					<button class="dropbtn">
						<p>Mon compte <span class="glyphicon glyphicon-user"></span></p>
					</button>
					<div class="dropdown-content">
						<a href="connexion.php">Se connecter</a>
						<a href="inscription.php">S'inscrire</a>
						<a href="admin.php">Admin</a>
					</div>
				</div>
				<a href="panier.php">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
			</div>
		</div>
	</header>
	<!-- Fin Nav -->

	<div class="container">

		<h3> <strong>Rejoignez l'aventure ECEbay !</strong></h3>
		<div id="btn_group" class="btn-group btn-group-lg">
			<a href="inscription_seller.php"><button type="button" class="btn" id="btn1"><strong>Vendeur</strong></button></a>
			<a href="inscription_buyer.php"><button type="button" class="btn" id="btn2"><strong>Acheteur</strong></button></a>
		</div>
	</div>

	<form enctype="multipart/form-data" action="" method="post">
		<h3>Inscription</h3>

		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="s_name" placeholder="Nom..." name="name" required>
		</div>

		<div class="form-group">
			<label for="firstname">Prénom</label>
			<input type="text" class="form-control" name="firstname" placeholder="Prénom..." required>
		</div>

		<div class="form-group">
			<label for="email">Addresse E-mail</label>
			<input type="email" class="form-control" name="id_seller" placeholder="Addresse e-mail..." required>
		</div>
		<div class="form-group">
			<label for="password">Mot de Passe</label>
			<input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
		</div>
		<div class="form-group">
			<label for="password">Confirmer le Mot de Passe</label>
			<input type="password" class="form-control" name="password_confirm" placeholder="Confirmer" required>
		</div>

		<div class="form-group" id="photo">
			<label for="photo">Photo de ¨Profil</label>
			<input type="file" class="form-control-file" name="photo_path">
		</div>
		<div class="form-group" id="background">
			<label for="background">Photo de Fond</label>
			<input type="file" class="form-control-file" name="background_path">
		</div>
		<button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Submit</button>

	</form> <!-- /form -->
	<?php

	/*if (empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['id_seller']) || empty($_POST['password']) || empty($_POST['password_confirm'])|| empty($_FILES['photo_path'])|| empty($_FILES['background_path']))
	{
		echo "ERREUR : tous les champs n'ont pas ete renseignés.";
	}
	else
	if (!empty($_POST['btn_submit'])){
		if ($_POST['password_confirm']==$_POST['password']) {
		$s_name=$_POST['s_name'];
		$firstname=$_POST['firstname'];
		$id_seller=$_POST['id_seller'];
		$password=$_POST['password'];
		$photo_path=$_FILES['photo_path']['name'];
		$background_path=$_FILES['background_path']['name'];
		}
		else {
		echo "ERREUR : mdp.";
		exit();
		}
	}*/

	try {
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		echo "cool1";
	} catch (Exception $e) {
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : ' . $e->getMessage());
	}


	if (isset($_POST['btn_submit'])) {
		if ($_POST['password'] == $_POST['password_confirm']) {


			$reponse = $bdd->prepare('INSERT INTO seller (ID_Seller, Name, Firstname, Password, Photo_path, Background_path) VALUES (? ,? , ?, ?, ?, ?)');
			$reponse->execute(array(
				$_POST['id_seller'],
				$_POST['s_name'],
				$_POST['firstname'],
				$_POST['password'],
				$_FILES['photo_path']['name'],
				$_FILES['background_path']['name']
			));

			$reponse->closeCursor();
		} else {
			echo "mdp";
		}
	}
	?>
	<div id="footer">
		<div class="footer_description">
			<p> <strong>Nous contacter </strong> </p>
			<h5> 37, quai de Grenelle 75015 Paris France <br><br> infos@ece-ebay.fr <br><br>
				+33 01 02 03 04 05 </h5>
		</div>
		<div class="copyright">
			Copyright &copy; 2020 eBay ECE Inc. Tous droits réservés à l'ECE Paris Lyon.
		</div>
	</div>
</body>



</html>