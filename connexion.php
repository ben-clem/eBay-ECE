<?php
if (empty(session_id()) ) {session_start();}
if (isset($_SESSION['id_user'])) {
 header('Location: /ebay-ECE/index.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ma page de connextion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">

	#connected 

	{
		color: white;
		font-size: 20px;
		text-align: center;
		position: relative;
		top : 20px;
	}

	#connected a {
		color: lightgrey;
		font-style: underline;
	}

		.topnav {
			background-color: #223843;
			position: absolute; 
			top:0;
			width : 100%;
			left:0;
			height : 50px;
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
			height : 50px;
			display : flex;
		}
	
		.dropbtn {
			background-color: #223843;
			color: white;
			padding: 16px;
			font-size: 15px;
			border: none;
			height : 50px;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
			background-color: lightgrey;
			min-width: 160px;
			z-index: 1;
			font-size : 10px;
		}

		.dropdown-content a {
			color: black;
			padding: 10px 15px;
			text-decoration: none;
			display: block;
			font-size : 10px;
			height: 30px;
		}


		header {display : row;
			background-color: #223843;
			top : 0;
			left: 0;}

	.dropdown-content a:hover {background-color: rgba(0,0,0,0.1);
				height : 100%;}

				.dropdown:hover .dropdown-content {display: grid;}

				.dropdown:hover .dropbtn {background-color: red;
				}
	body {background-image: url("img/background_connexion.jpg");
			height:100%;
			background-size: cover;
			background-repeat: no-repeat;
			font-family: 'Numans', sans-serif;
			align-content: center;}

	#connexion_form {height: 320px;
			margin-top: 80px;
			margin-left: 450px;
			width: 400px;
			padding-bottom: 20px;
			background-color: rgba(0,0,0,0.6)!important ;
			border-radius: 1.5em;
			color : white;
			padding : 20px;}

	input:focus{outline: 0 0 0 0  !important;
			box-shadow: 0 0 0 0 !important;}
	.login_btn{color: black;
			background-color: #6495ED;
			width: 100px;}

	.login_btn:hover{color: black;
			background-color: white;}
	#connexion_form h4 {
			text-align: center;
			color : lightgrey;
		}

	#form_footer {
			float :left ;
			padding : 5px;
		}

		

	
</style>
</head>
<body>
	<!-- Navigation -->
	<header class="page-header header container-fluid">

		<form id ="connexion_form" action="#php" method="post">
			<div class="topnav">
				<a href="index.php"> <span class="glyphicon glyphicon-home"></span> </a>
				<div class="dropdown">
					<button class="dropbtn"> Achats </button>
					<div class="dropdown-content">
						<a href="#">Vente aux enchères</a> 
						<a href="#">Achat Immédiat</a>
						<a href="#">Meilleure offre</a>
					</div>
				</div>

				<div class="dropdown">
					<button class="dropbtn">Categories</button>
					<div class="dropdown-content">
						<a href="#">Ferraille ou Trésor</a>
						<a href="#">Accessoires VIP</a>
						<a href="#">Bon pour le Musée</a>
					</div>
				</div>

  				<div class="topnav-right">

  					<div class="dropdown">
					<button class="dropbtn"><p>Mon compte <span class="glyphicon glyphicon-user"></span></p></button>
					<div class="dropdown-content">
						<a href="connexion.php">Se connecter</a>
						<a href="inscription_seller.php">S'inscrire</a>
						<a href="connexion.php">Admin</a>
					</div>
					</div>
					<a href="#about">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>

  				</div>

			</div>
		</header>

		<form id ="connexion_form" action="connexion.php" method="post">

				<h4> <strong> Connexion </strong> </h4>
					<div class="input-group form-group">
						<label for="connexion_email">Adresse E-mail</label>
						<input type="email" class="form-control" name="id_user" placeholder="Adresse E-mail">
						
					</div>
					<div class="input-group form-group">
						<label for="connexion_password">Mot de Passe</label>
						<input type="password" name ="password" class="form-control" placeholder="Mot de Passe">
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

		try
  {

	//connexion mysql
    $bdd = new PDO('mysql:host=localhost;dbname=eBay ECE;charset=utf8', 'benzinho', '75011', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
   // si erreur
  catch(Exception $e)
  {
  	
    die('Erreur : '.$e->getMessage());
  }


  	if (isset($_POST['btn_submit'])) 
  	{
   		 $req = $bdd->prepare('SELECT ID_Seller, Firstname, Password FROM seller WHERE ID_Seller=? AND Password=?');
   		 $req->execute(array($_POST['id_user'],
   							$_POST['password']));
   		 $login_info = $req->fetch();
	 if (!$login_info) { 
	 		 $req = $bdd->prepare('SELECT ID_Buyer, Firstname, Password FROM buyer WHERE ID_Buyer=? AND Password=?');
   		 $req->execute(array($_POST['id_user'],
   							$_POST['password']));
   		 $login_info = $req->fetch();
   		 if (!$login_info) {
	 			echo 'Mauvais identifiant ou mot de passe !';
	 		}
		    else
		    {
		      $_SESSION['id_user'] = $login_info['ID_Buyer'];
		       $_SESSION['Firstname'] = $login_info['Firstname'];
		       $_SESSION['user_type']=1;
		       echo $_SESSION['id_user'];
		      echo "<p> Vous êtes maintenant connecté !<br> Merci de vous rediriger vers <a href='index.php'> page d'accueil </p>";
		    }
		  }
	else 
	{
		 $_SESSION['id_user'] = $login_info['ID_Seller'];
		 $_SESSION['Firstname'] = $login_info['Firstname'];
		 $_SESSION['user_type']=0;
		 echo $_SESSION['id_user'];
		      echo '<p> Vous êtes maintenant connecté !<br> Merci de vous rediriger vers <a href="index.php"> page d\'accueil </p>';
	}
 }

    ?>
</div>

   
</script>

</body>
</html>
