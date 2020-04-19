<?php

if (!empty($_POST['btn_submit'])){
		$name=$_POST['b_name'];
		$firstname=$_POST['firstname'];
		$id_seller=$_POST['id_seller'];
		$password=$_POST['password'];
		$photo_path=$_FILES['photo_path']['name'];
		$background_path=$_FILES['background_path']['name'];
		$postal_address=$_POST['postal_address'];
		$postal_code=$_POST['postal_code'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		$card_number=$_POST['card_number'];
		$card_name=$_POST['card_name'];
		$expire=$_POST['expire'];
		$cvv=$_POST['cvv'];
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
	<link rel="stylesheet" type="text/css" href="css/inscription_buyer.css">
</head>
<body>
	<header class="page-header header container-fluid">

			<div class="topnav">
				<a href="#search"> <span class="glyphicon glyphicon-home"></span> </a>
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

		<div class="container">
  			
  			<h3> <strong>Rejoignez l'aventure ECEbay !</strong></h3>
 			<div id ="btn_group" class="btn-group btn-group-lg">
    			<a href="inscription_seller.php"><button type="button" class="btn" id="btn1"><strong>Vendeur</strong></button></a>
    			<a href="inscription_buyer.php"><button type="button" class="btn" id="btn2"><strong>Acheteur</strong></button></a>
  			</div>
  		</div>
  		<form enctype="multipart/form-data" action=" "method="post">
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
   			     <div id ="btn_group2">
   			     <button type="button" id="prevBtn" onclick="show_account_form()">Previous</button>
   			     <button type="button" id="nextBtn" onclick="show_banking_form()">Next</button>
   			 	</div>

  			</div>

  			<div id="banking_form">
  				<h3> Infos bancaires </h3>
  				  <div class="form-group">
   					 <label for="card_name">Nom du Titulaire</label>
   					 <input type="text" class="form-control" name="card_name" placeholder="Nom..."required>
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
   			     <div id ="btn_group2">
   			     <button type="button" id="prevBtn" onclick="show_address_form()">Previous</button>
   			      <button type="submit" id="nextBtn"  name="btn_submit">Submit</button>  <!-- à voir comment faire pour que quand l'utilisateur appuie sur Submit, il est redirigé vers SA page d'accueil t'as capté-->
   			 	</div>

  			</div>
  		</form>

  <?php

  		try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}


	if (isset($_POST['btn_submit'])) {
		if($_POST['password'] == $_POST['password_confirm']) {
		

		$reponse = $bdd->prepare('INSERT INTO buyer (ID_Buyer, Password, Name, Firstname, Address,
		Bank_Info, Amount, Photo_path, Background_path) VALUES (? ,? , ?, ?, ?, ?, ?, ?, ?)');
		$reponse->execute(array(
			$_POST['id_buyer'],
			$_POST['password'],
			$_POST['b_name'],
			$_POST['firstname'],
			$_POST['postal_address'].$_POST['postal_code'].$_POST['city'].$_POST['country'],
			$_POST['card_number'].$_POST['card_name'].$_POST['expire'].$_POST['cvv'],
			0,
			$_FILES['photo_path']['name'],
			$_FILES['background_path']['name']));

		$reponse->closeCursor();
}
else {
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


  
			function show_account_form()
		  {
		    document.getElementById('account_form').style.display = 'block';
		    document.getElementById('address_form').style.display = 'none';
		    document.getElementById('banking_form').style.display = 'none';
		  }

		  function show_address_form()
		  {
		    document.getElementById('account_form').style.display = 'none';
		    document.getElementById('address_form').style.display = 'block';
		    document.getElementById('banking_form').style.display = 'none';
		  }

		  function show_banking_form()
		  {
		    document.getElementById('account_form').style.display = 'none';
		    document.getElementById('address_form').style.display = 'none';
		    document.getElementById('banking_form').style.display = 'block';
		  }
		</script>

</html>