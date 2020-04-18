<!DOCTYPE html>
<html>
<head>
			<title>Page_Catégories</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		 	
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
		   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
 			<link rel="stylesheet" type="text/css" href="css/items.css">

</head>

<body>

	  <!-- BARRE DE NAVIGATION -->
<header class="page-header header container-fluid">
			<div class="topnav">
				<a href="index.html"> <span class="glyphicon glyphicon-home"></span> </a>
				<div class="dropdown">
					 <a class="dropbtn" href="achats.html"> Achats </a>
                   <!-- <div class="dropdown-content">
                        <a href="#">Vente aux enchères</a> 
                        <a href="#">Achat Immédiat</a>
                        <a href="#">Meilleure offre</a>
                    </div>-->

				</div>

				<div class="dropdown">
					<a class="dropbtn" href="categories.html" >Categories</a>
                   <!-- <div class="dropdown-content">
                        <a href="#">Ferraille ou Trésor</a>
                        <a href="#">Accessoires VIP</a>
                        <a href="#">Bon pour le Musée</a>
                    </div> -->
				</div>
  				<div class="topnav-right">

  					<div class="dropdown">
					<button class="dropbtn"><p>Mon compte <span class="glyphicon glyphicon-user"></span></p></button>
					<div class="dropdown-content">
						<a href="#">Se connecter</a>
						<a href="#">S'inscrire</a>
						<a href="#">Admin</a>
					</div>
					</div>
					<a href="#about">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
    				
  				</div>
			</div>
		</header>

<div class="container">
                <div class="row my-2">
                	<?php
        				$id = $_GET["id"];
        				if($id == 1) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Ventes aux enchères </h5> <br><br><br><br>
	                <?php } ?>
                    
                    <?php
	        			$id = $_GET["id"];
	                    if($id == 2) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Tous les articles en meilleure offre </h5><br><br><br><br>
                    <?php } ?>

                    <?php
        				$id = $_GET["id"];
	                    if($id == 3) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Tous les articles en achat immédiat </h5><br><br><br><br>
                    <?php } ?>

					<?php
        				$id = $_GET["id"];
	                    if($id == 4) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Tous les articles Ferraille ou Trésor </h5><br><br><br><br>
                    <?php } ?>
					
					<?php
        				$id = $_GET["id"];
	                    if($id == 5) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Tous les articles Bon pour le Musée </h5><br><br><br><br>
                    <?php } ?>
					
					<?php
        				$id = $_GET["id"];
	                    if($id == 6) { ?>
	                    <h5 class="mx-auto px-2" id ="first"> Tous les Accessoires VIP </h5><br><br><br><br>
                    <?php } ?>


                </div>
                <div class="row mx-5">



<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        //identifier le nom de base de données
        $database = "testpiscine";
        $id = $_GET["id"]; 
        //connectez-vous dans votre BDD
        //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $db_found = mysqli_select_db($db_handle, $database);
         //si le BDD existe, faire le traitement
            if ($db_found) {
            	if ($id == 1) {
                     $sql = "SELECT * FROM items WHERE (sale_type = '100' OR sale_type = '110') "; } //encheres
                if ($id == 2) {
                     $sql = "SELECT * FROM items WHERE (sale_type = '001' OR sale_type = '011') "; } //offre
            	if ($id == 3) {
                     $sql = "SELECT * FROM items WHERE (sale_type = '010' OR sale_type = '110' OR sale_type = '011') "; } //achat immediat
                if ($id == 4) {
                     $sql = "SELECT * FROM items WHERE category = 'tresor' "; }
                if ($id == 5) {
                     $sql = "SELECT * FROM items WHERE category = 'musee' "; }
                if ($id == 6) {
                     $sql = "SELECT * FROM items WHERE category = 'vip' "; }

                     $result = mysqli_query($db_handle, $sql);
                     
                     while ($data = mysqli_fetch_assoc($result)) {
               
		            
		?>	  
		                  <!-- Marketing Icons Section -->
                    <div class="col-sm-4 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="startbootstrap-shop-item-gh-pages/shop-item.php?
                                    name=<?php echo $data["name"]?>
                                    &description=<?php echo $data["description"]?>
                                    &sale_type=<?php echo $data["sale_type"]?>"
                                    >
                                    	<?php echo $data['name'] ; ?>

                                    </a>


                                </h4>
                                <p class="card-text"><?php echo $data['description'] ; ?></p>
                            </div>
                        </div>
                    </div>
                
      <?php } } //end if
                    //si le BDD n'existe pas
                    else {
                     echo "Database not found";
                    }//end else
                    //fermer la connection
                    mysqli_close($db_handle); ?>
   
     </div>
     </div>
</body>
</html>