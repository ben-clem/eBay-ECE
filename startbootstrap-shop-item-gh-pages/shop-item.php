<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Item</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="shop-item.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">



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

<?php
        //identifier le nom de base de données
        $database = "testpiscine";
        //connectez-vous dans votre BDD
        //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $db_found = mysqli_select_db($db_handle, $database);
         //si le BDD existe, faire le traitement
            if ($db_found) {
                     $sql = "SELECT * FROM test";
                     $result = mysqli_query($db_handle, $sql);
                     while ($data = mysqli_fetch_assoc($result)) {
?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4"><?php echo $data['nom'] ; ?> </h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Achat Immédiat</a>
          <a href="#" class="list-group-item">Enchères</a>
          <a href="#" class="list-group-item">Ajouter au panier</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $data['nom'] ; ?></h3>
            <h4><?php echo $data['prix'] ; echo " Euros" ; ?></h4>
            <p class="card-text"><?php echo $data['description'] ;    }//end while
                            }//end if
                    //si le BDD n'existe pas
                    else {
                     echo "Database not found";
                    }//end else
                    //fermer la connection
                    mysqli_close($db_handle);
?>          </p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
        <!-- /.card -->

   <!--     <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
<footer class="navbar-dark bg-ece mb-0 px-2 pt-3 pb-1">

            <div class="row">
                <p class="white mx-auto my-0 py-0" id="copyright">Copyright &copy; 2020 eBay ECE Inc. Tous droits
                    réservés à
                    l'ECE Paris-Lyon.</p>
            </div>
        </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
