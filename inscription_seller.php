<?php

if (!empty($_POST['btn_submit'])){
		$s_name=$_POST['s_name'];
		$firstname=$_POST['firstname'];
		$id_seller=$_POST['id_seller'];
		$password=$_POST['password'];
		$photo_path=$_FILES['photo_path']['name'];
		$background_path=$_FILES['background_path']['name'];
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
    <link rel="stylesheet" type="text/css" href="css/inscription_seller.css">
    <style type="text/css">
    	
    	#btn_submit
{
	width : 100px;
	margin-left: 175px;
}
    </style>

</head>


<body>

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

		<div class="container">
  			
  			<h3> <strong>Rejoignez l'aventure ECEbay !</strong></h3>
 			<div id ="btn_group" class="btn-group btn-group-lg">
    			<a href="inscription_seller.php"><button type="button" class="btn" id="btn1"><strong>Vendeur</strong></button></a>
    			<a href="inscription_buyer.php"><button type="button" class="btn" id="btn2"><strong>Acheteur</strong></button></a>
  			</div>
  		</div>

  		<form enctype="multipart/form-data" action="" method="post">
                <h3>Inscription</h3>

                <div class="form-group">
   					 <label for="name">Nom</label>
   					 <input type="text" class="form-control" name="s_name" placeholder="Nom..." 
   					 name="name"required>
   			     </div>

   			     <div class="form-group">
   					 <label for="firstname">Prénom</label>
   					 <input type="text" class="form-control" name="firstname" placeholder="Prénom..."required>
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


	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=eBay ECE;charset=utf8', 'benzinho', '75011', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}


	if (isset($_POST['btn_submit'])) {
		if($_POST['password'] == $_POST['password_confirm']) {
		

		$reponse = $bdd->prepare('INSERT INTO seller (ID_Seller, Name, Firstname, Password, Photo_path, Backgroung_path) VALUES (? ,? , ?, ?, ?, ?)');
		$reponse->execute(array(
			$_POST['id_seller'],
			$_POST['s_name'],
			$_POST['firstname'],
			$_POST['password'],
			$_FILES['photo_path'],
			$_FILES['background_path']));

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



	</html>