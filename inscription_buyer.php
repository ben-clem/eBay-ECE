<?php

if (!empty($_POST['btn_submit'])) {
	$name = $_POST['b_name'];
	$firstname = $_POST['firstname'];
	$id_seller = $_POST['id_seller'];
	$password = $_POST['password'];
	$photo_path = $_FILES['photo_path']['name'];
	$background_path = $_FILES['background_path']['name'];
	$postal_address = $_POST['postal_address'];
	$postal_code = $_POST['postal_code'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$card_number = $_POST['card_number'];
	$card_name = $_POST['card_name'];
	$expire = $_POST['expire'];
	$cvv = $_POST['cvv'];
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>ECEbay - Page d'inscription acheteur</title>
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
		}


		.container h3 {
			text-align: center;
		}

		.container {
			display: flex;
			flex-direction: column;
		}

		#btn1,
		#btn2 {
			width: 300px;
			height: 40px;
			color: white;
			border-spacing: 0px;
			border-color: black;
		}

		#btn2 {
			background-color: red;
		}

		#btn1 {
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

		a #btn1:hover {
			color: red;
		}

		#nextBtn:hover {
			background-color: rgba(0, 0, 0, 0.2);
			color: black;
		}

		#prevBtn:hover {
			background-color: rgba(0, 0, 0, 0.4);
			color: black;
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

		body {
			background-color: lightgrey;
			background-size: cover;
		}

		button {
			color: #ffffff;
			border: none;
			padding: 10px 20px;
			font-size: 17px;
			cursor: pointer;
			float: right;
		}

		#nextBtn {
			background-color: #4CAF50;
			width: 100px;
			height: 40px;
			float: right;
			border-left-style: 3px strong white;
		}

		#prevBtn {
			width: 100px;
			margin-left: 150px;
			background-color: grey;
			border-right-style: 3px strong white;

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

			font-size: 30px;
			font-weight: 600;
			color: #000000;
			margin-top: 10px;
			padding: 20px;
			text-align: center;
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
			height: auto;
			position: relative;
		}

		#btn_group2 {
			position: relative;

			display: flex;
			width: auto;
			height: 40px;
			left: 120px;
		}

		#address_form {
			display: none;
		}

		#banking_form {

			display: none;
		}

		#account_form {
			height: 630px;

		}
	</style>
</head>

<body>
	<!-- Navigation -->
	<header class="page-header header container-fluid">
		<div class="topnav">
			<a href="index.php"> <span class="glyphicon glyphicon-home"></span> </a>
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
						<a href="inscription_buyer.php">S'inscrire</a>
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
	<form enctype="multipart/form-data" action=" " method="post">
		<div id="account_form">
			<h3>Inscription</h3>
			<div class="form-group">
				<label for="b_name">Nom</label>
				<input type="text" class="form-control" name="b_name" placeholder="Nom..." required>
			</div>

			<div class="form-group">
				<label for="name">Prénom</label>
				<input type="texte" class="form-control" name="firstname" placeholder="Prénom..." required>
			</div>

			<div class="form-group">
				<label for="email">Adresse E-mail</label>
				<input type="email" class="form-control" name="id_buyer" placeholder="Adresse E-mail..." required>
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
			<div>
				<button type="button" id="nextBtn" onclick="show_address_form()">Next</button>
			</div>
		</div>
		<div id="address_form">
			<h3> Adresse </h3>
			<div class="form-group">
				<label for="address">Adresse Postale</label>
				<input type="text" class="form-control" name="postal_address" placeholder="Adresse..." required>
			</div>

			<div class="form-group">
				<label for="postal_code">Code Postal</label>
				<input type="texte" class="form-control" name="postal_code" placeholder="Code Postal" required>
			</div>
			<div class="form-group">
				<label for="city">Ville</label>
				<input type="texte" class="form-control" name="city" placeholder="Ville" required>
			</div>
			<div class="form-group">
				<label for="country">Pays</label>
				<input type="texte" class="form-control" name="country" placeholder="Pays" required>
			</div>
			<div id="btn_group2">
				<button type="button" id="prevBtn" onclick="show_account_form()">Previous</button>
				<button type="button" id="nextBtn" onclick="show_banking_form()">Next</button>
			</div>

		</div>

		<div id="banking_form">
			<h3> Infos bancaires </h3>
			<div class="form-group">
				<label for="card_name">Nom du Titulaire</label>
				<input type="text" class="form-control" name="card_name" placeholder="Nom..." required>
			</div>

			<div class="form-group">
				<label for="card_number">Numéro de la Carte</label>
				<input type="texte" class="form-control" name="card_number" placeholder="Numéro de la carte">
			</div>
			<div class="form-group">
				<label for="expire"> Expire le </label>
				<input type="texte" class="form-control" name="expire" placeholder="Expire le mm/yy" required>
			</div>
			<div class="form-group">
				<label for="cvv">CVV</label>
				<input type="texte" class="form-control" name="cvv" placeholder="CVV" required>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1" required>
				<label class="form-check-label" for="exampleCheck1"> <br> Accepter la clause d'achat</label>
			</div>
			<div id="btn_group2">
				<button type="button" id="prevBtn" onclick="show_address_form()">Previous</button>
				<button type="submit" id="nextBtn" name="btn_submit">Submit</button> <!-- à voir comment faire pour que quand l'utilisateur appuie sur Submit, il est redirigé vers SA page d'accueil t'as capté-->
			</div>

		</div>
	</form>

	<?php

	try {
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $e) {
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : ' . $e->getMessage());
	}


	if (isset($_POST['btn_submit'])) {
		if ($_POST['password'] == $_POST['password_confirm']) {


			$reponse = $bdd->prepare('INSERT INTO buyer (ID_Buyer, Password, Name, Firstname, Address,
		Bank_Info, Amount, Photo_path, Background_path) VALUES (? ,? , ?, ?, ?, ?, ?, ?, ?)');
			$reponse->execute(array(
				$_POST['id_buyer'],
				$_POST['password'],
				$_POST['b_name'],
				$_POST['firstname'],
				$_POST['postal_address'] . $_POST['postal_code'] . $_POST['city'] . $_POST['country'],
				$_POST['card_number'] . $_POST['card_name'] . $_POST['expire'] . $_POST['cvv'],
				0,
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

<script type="text/javascript">
	function show_account_form() {
		document.getElementById('account_form').style.display = 'block';
		document.getElementById('address_form').style.display = 'none';
		document.getElementById('banking_form').style.display = 'none';
	}

	function show_address_form() {
		document.getElementById('account_form').style.display = 'none';
		document.getElementById('address_form').style.display = 'block';
		document.getElementById('banking_form').style.display = 'none';
	}

	function show_banking_form() {
		document.getElementById('account_form').style.display = 'none';
		document.getElementById('address_form').style.display = 'none';
		document.getElementById('banking_form').style.display = 'block';
	}
</script>

</html>