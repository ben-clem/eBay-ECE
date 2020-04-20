<?php

	session_start();

if (isset($_SESSION['id_user'])) {
	header('Location: index.php');
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
	<link rel="stylesheet" href="css/connexion.css"> 
	<!-- STYLES SPECIFIQUES A CETTE PAGE ICI -->

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

	<!-- Page title -->
	<title>Connexion</title>

	<style>
		body {
	background-image: url("img/background_connexion.jpg");
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Numans', sans-serif;
    align-content: center;
}
	</style>
</head>

<body>
	<div class="page-container">
		<!-- Navigation -->
        <header class="page-header header container-fluid my-3 mb-5">
            <div class="topnav">
                <a href="index.php"> <span class="glyphicon glyphicon-home"></span> </a>
                <div class="dropdown">
                    <a class="dropbtn" href="achats.php">Types d'achats</a>
                </div>
                <div class="dropdown">
                    <a class="dropbtn" href="categories.php">Catégories</a>
                </div>
                <div class="dropdown">
                    <?php if ($_SESSION['user_type'] == 1) {
                        ?>
                    <a class="dropbtn" href="index_vendeur.php">Page Vendeur</a>
                    <?php } ?>
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
                            <?php if (!isset($_SESSION['id_user'])) { ?>
                            <a href="inscription_buyer.php">S'inscrire</a>
                            <?php } ?>
                            <a href="admin.php">Admin</a>
                        </div>
                    </div>
                    <a href="panier.php">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
                </div>
            </div>
        </header>
        <!-- Fin Nav -->
		<div class="content-wrap">

			<form id="connexion_form" action="connexion.php" method="post">

				<h4> <strong> Connexion </strong> </h4>
				<div class="input-group form-group">
					<label for="connexion_email">Adresse E-mail</label>
					<input type="email" class="form-control" name="id_user" placeholder="Adresse E-mail">

				</div>
				<div class="input-group form-group">
					<label for="connexion_password">Mot de Passe</label>
					<input type="password" name="password" class="form-control" placeholder="Mot de Passe">
				</div>

				<div class="form-group">
					<input type="submit" value="Login" class="btn float-right login_btn" name="btn_submit">
				</div>

				<div id="form_footer">
					<div class="d-flex justify-content-center links">
						<p> <br> Nouveau ? <a href="inscription_seller.html"> Inscrivez-vous </a></p>
					</div>
					<div class="d-flex justify-content-center">
						<h6><a href="#"> <br> Mot de passe oublié ?</a></h6>
					</div>
				</div>
			</form>
			<div id=connected>

				<?php
				if ( empty($_SESSION['id_user']) ) {
					try {

						//connexion mysql
						//$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						$bdd = new PDO('mysql:host=localhost;dbname=eBay ECE;charset=utf8', 'benzinho', '75011', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					}
					// si erreur
					catch (Exception $e) {

						die('Erreur : ' . $e->getMessage());
					}


					if (isset($_POST['btn_submit'])) {
						$req = $bdd->prepare('SELECT ID_Seller, Firstname, Password FROM seller WHERE ID_Seller=? AND Password=?');
						$req->execute(array(
							$_POST['id_user'],
							$_POST['password']
						));
						$login_info = $req->fetch();
						if (!$login_info) {
							$req = $bdd->prepare('SELECT ID_Buyer, Firstname, Password FROM buyer WHERE ID_Buyer=? AND Password=?');
							$req->execute(array(
								$_POST['id_user'],
								$_POST['password']
							));
							$login_info = $req->fetch();
							if (!$login_info) {
								echo 'Mauvais identifiant ou mot de passe !';
							} else {
								$_SESSION['id_user'] = $login_info['ID_Buyer'];
								$_SESSION['Firstname'] = $login_info['Firstname'];
								$_SESSION['user_type'] = 0;
								echo "<p> Vous êtes maintenant connecté !<br> Merci de vous rediriger vers <a href='index.php'> page d'accueil </p>";
							?> <meta http-equiv = "refresh" content ="1; url = index.php" /> <?php

							}
						} else {
							$_SESSION['id_user'] = $login_info['ID_Seller'];
							$_SESSION['Firstname'] = $login_info['Firstname'];
							$_SESSION['user_type'] = 1;
							
							echo '<p> Vous êtes maintenant connecté !<br> Merci de vous rediriger vers <a href="index.php"> page d\'accueil </p>';
							?> <meta http-equiv = "refresh" content ="1; url = index.php" /> <?php 
						}
					}
			}
				?>

			</div>


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