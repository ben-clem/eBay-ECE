<!DOCTYPE html>
<html>

<head>
	<title>Page_Type_Achats</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/achats.css">

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
						<a href="inscription_buyer.php">S'inscrire</a>
						<a href="admin.php">Admin</a>
					</div>
				</div>
				<a href="panier.php">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
			</div>
		</div>
	</header>
	<!-- Fin Nav -->

	<div id="titre_page">
		<p> Les différents types d'achats </p>
	</div>

	<!-- AFFICHAGE DES IMAGES -->
	<div id="section">
		<a href="#" class="zoom-out"> <img src="img/enc.jpg" height="200" width="200"> </a>
		<a href="#" class="zoom-out"> <img src="img/offre.jpg" height="200" width="200"> </a>
		<a href="#" class="zoom-out"> <img src="img/achat.jpg" height="200" width="200"> </a>
	</div>

	<table id="titres">
		<tr>
			<th> Vente aux enchères </th>
			<th STYLE="padding:0 0 0 200px;"> Meilleure offre </th>
			<th STYLE="padding:0 0 0 220px;"> Achats Immédiat </th>
		</tr>
	</table>



</body>

</html>