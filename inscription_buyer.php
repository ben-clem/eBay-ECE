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

	<!-- Meta tags -->
	<meta charset="UTF-8"> <!-- specify the character encoding -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- make it responsive -->
	<meta name="description" content="eBay ECE, vente aux enchères en ligne
    pour la communauté ECE Paris "> <!-- Search Engines description -->
	<meta name="keywords" content="eBay, ECE, vente, enchères"> <!-- Search Engines keywords -->

	<!-- links to bootstrap style sheet and my own style sheet -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- STYLES SPECIFIQUES A CETTE PAGE ICI -->
	<link rel="stylesheet" href="css/inscription_buyer.css"> <!-- STYLES SPECIFIQUES A CETTE PAGE ICI -->
	<!-- STYLES SPECIFIQUES A CETTE PAGE ICI -->

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	<!-- Page title -->
	<title>Inscription Acheteur</title>

	<!-- Script pour gérer les pages du formulaire -->
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

</head>


<body>
	<div class="page-container">
		<!-- Navigation -->
		<header class="page-header header container-fluid my-3 mb-5">
			<div class="topnav">
				<a href="index.php"> <span class="glyphicon glyphicon-home"></span> </a>
				<div class="dropdown">
					<a class="dropbtn" href="achats.php"> Achats </a>
				</div>
				<div class="dropdown">
					<a class="dropbtn" href="categories.php">Categories</a>
				</div>
				<div class="topnav-right">
					<div class="dropdown">
						<button class="dropbtn">
							<p> <?php if (isset($_SESSION['id_user'])) {
									echo "Bonjour, ";
									echo $_SESSION['Firstname'];
								} else {
									echo "Mon Compte";
								}
								?> <span class="glyphicon glyphicon-user"></span></p>
						</button>
						<div class="dropdown-content">
							<?php if (isset($_SESSION['id_user'])) {
								echo '<a href="#" onclick="deconnect()">Se déconnecter</a> ';
							} else {
								echo '<a href="connexion.php">Se connecter</a> ';
							}
							?>
							<a href="inscription_buyer.php">S'inscrire</a>
							<a href="admin.php">Admin</a>
						</div>
					</div>
					<a href="panier.php">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
				</div>
			</div>
		</header>
		<!-- Fin Nav -->
		<div class="content-wrap">
			<div>

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
						<button type="button" class="nextBtn" onclick="show_address_form()">Next</button>
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
						<button type="button" class="prevBtn" onclick="show_account_form()">Previous</button>
						<button type="button" class="nextBtn" onclick="show_banking_form()">Next</button>
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
						<button type="button" class="prevBtn" onclick="show_address_form()">Previous</button>
						<button type="submit" class="nextBtn" name="btn_submit">Submit</button> <!-- à voir comment faire pour que quand l'utilisateur appuie sur Submit, il est redirigé vers SA page d'accueil t'as capté-->
					</div>

				</div>
			</form>

			<?php

			try {
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=localhost;dbname=eBay ECE;charset=utf8', 'benzinho', '75011', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
			} catch (Exception $e) {
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : ' . $e->getMessage());
			}


			
			?>

		</div>
		<!-- Footer -->
		<footer class="footer navbar-dark bg-ece mb-0 pt-3">
			<h6 class="white mr-0 ml-3" style="width: 50%">NOUS CONTACTER</h6>
			<div class="row mx-4 mb-0 my-1">
				<svg class="bi bi-building white" width="25px" height="25px" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M15.285.089A.5.5 0 0115.5.5v15a.5.5 0 01-.5.5h-3a.5.5 0 01-.5-.5V14h-1v1.5a.5.5 0 01-.5.5H1a.5.5 0 01-.5-.5v-6a.5.5 0 01.418-.493l5.582-.93V3.5a.5.5 0 01.324-.468l8-3a.5.5 0 01.46.057zM7.5 3.846V8.5a.5.5 0 01-.418.493l-5.582.93V15h8v-1.5a.5.5 0 01.5-.5h2a.5.5 0 01.5.5V15h2V1.222l-7 2.624z" clip-rule="evenodd" />
					<path fill-rule="evenodd" d="M6.5 15.5v-7h1v7h-1z" clip-rule="evenodd" />
					<path d="M2.5 11h1v1h-1v-1zm2 0h1v1h-1v-1zm-2 2h1v1h-1v-1zm2 0h1v1h-1v-1zm6-10h1v1h-1V3zm2 0h1v1h-1V3zm-4 2h1v1h-1V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm-2 2h1v1h-1V7zm2 0h1v1h-1V7zm-4 0h1v1h-1V7zm0 2h1v1h-1V9zm2 0h1v1h-1V9zm2 0h1v1h-1V9zm-4 2h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1z" />
				</svg>
				<a class="link ml-3 mb-0 pl-2 lightgrey" href="https://goo.gl/maps/wKUyiYcg5y4VWvs27" target="_blank">37, Quai de Grenelle, 75015 Paris, France</a>
			</div>
			<div class="row mx-4 mb-0 my-1">
				<svg class="bi bi-envelope white" width="25px" height="25px" viewBox="0 0 17 17" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M14 3H2a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1zM2 2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H2z" clip-rule="evenodd" />
					<path fill-rule="evenodd" d="M.071 4.243a.5.5 0 01.686-.172L8 8.417l7.243-4.346a.5.5 0 01.514.858L8 9.583.243 4.93a.5.5 0 01-.172-.686z" clip-rule="evenodd" />
					<path d="M6.752 8.932l.432-.252-.504-.864-.432.252.504.864zm-6 3.5l6-3.5-.504-.864-6 3.5.504.864zm8.496-3.5l-.432-.252.504-.864.432.252-.504.864zm6 3.5l-6-3.5.504-.864 6 3.5-.504.864z" />
				</svg>
				<a class="link ml-3 mb-0 pl-2 lightgrey" href="mailto:ebay.ece.binks" target="_blank">infos@ece-ebay.fr</a>
			</div>
			<div class="row mx-4 mb-0 my-2">
				<svg class="bi bi-phone white" width="25px" height="25px" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z" clip-rule="evenodd" />
					<path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
				</svg>
				<a class="link ml-3 mb-0 pl-2 lightgrey" href="tel:+33 6 78 66 01 08">+33 6 78 66 01 08</a>
			</div>
			<p class="white mx-auto my-0 py-0 text-center" id="copyright">Copyright &copy; 2020 eBay ECE Inc. Tous droits réservés à l'ECE Paris-Lyon.</p>
		</footer>
		<!-- fin Footer -->
	</div>

</body>
</html>