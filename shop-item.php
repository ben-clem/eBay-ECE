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
  <link rel="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300)">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript">
    function encherir() {
      var enchere;
      enchere = prompt("Combien voulez vous enchérir pour ce produit?");
      alert("Merci ! Nous avons bien enregistré votre enchère");
    }

    function offre() {
      var offre;
      enchere = prompt("Quel est le montant de votre offre pour ce produit?");
      alert("Merci ! Nous avons bien transmis votre offre au vendeur");
    }
  </script>

</head>

<body>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); ?>

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


      <?php
      //identifier le nom de base de données
      $database = "eBay ECE";
      $name = $_GET["name"];
      $description = $_GET["description"];
      $sale_type = $_GET["sale_type"];

      //connectez-vous dans votre BDD
      //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
      $db_handle = mysqli_connect('localhost', 'benzinho', '75011');
      ?>
      <!-- Page Content -->

      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h1 class="my-4"><?php echo $name; ?> </h1> <br>
            <div class="list-group">

              <!-- ENCHERES SEULEMENT-->
              <?php if ($sale_type == '100') { ?>
                <button class="list-group-item" onclick="encherir()">
                  <div class="bouton">Enchérir</div> <br>
                  <div class="info"> Enchère maximale : 300 Euros <br> Nombre d'enchères : 5 <br> Temps restant : 01:34:00 <br> <a href="#" id="lol"> Ajouter au panier </a> <br><br>
                  </div>
                </button>
              <?php } ?>

              <!-- ENCHERES et ACHAT IMMEDIAT-->
              <?php if ($sale_type == '110') { ?>

                <button class="list-group-item" onclick="">
                  <div class="bouton"> Achat Immédiat </div>
                  <div class="info"> Prix : <br> <a href="#" id="lol"> Ajouter au panier </a> <br>
                  </div>
                </button>

                <button class="list-group-item" onclick="encherir()">
                  <div class="bouton">Enchérir</div> <br>
                  <div class="info"> Enchère maximale : 300 Euros <br> Nombre d'enchères : 5 <br> Temps restant : 01:34:00 <br><br>
                  </div>
                </button>

              <?php } ?>

              <!-- ACHAT IMMEDIAT SEULEMENT -->
              <?php if ($sale_type == '010') { ?>
                <button class="list-group-item" onclick="">
                  <div class="bouton"> Achat Immédiat </div>
                  <div class="info"> Prix : <br> <a href="#" id="lol"> Ajouter au panier </a> <br>
                  </div>
                </button>
              <?php } ?>

              <!-- OFFRE SEULEMENT-->
              <?php if ($sale_type == '001') { ?>

                <button class="list-group-item" onclick="offre()">
                  <div class="bouton">Faire une offre</div>
                  <div class="info"> <a href="#" id="lol"> Ajouter au panier </a>
                </button>
              <?php } ?>

              <!-- OFFRE et ACHAT-->
              <?php if ($sale_type == '011') { ?>
                <button class="list-group-item" onclick="">
                  <div class="bouton"> Achat Immédiat </div>
                  <div class="info"> Prix : <br> <a href="#" id="lol"> Ajouter au panier </a> <br>
                  </div>
                </button>

                <button class="list-group-item" onclick="offre()">
                  <div class="bouton">Faire une offre </div>
                </button>
              <?php } ?>


            </div>
          </div>
          <!-- /.col-lg-3 -->

          <div class="col-lg-9">

            <div class="card mt-4">
              <!-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> -->
              <!-- CAROUSSEL -->
              <header>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('boucle.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('boucle.jpg')">
                      <div class="carousel-caption d-none d-md-block">

                      </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('boucle.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </header>

              <div class="card-body">
                <h3 class="card-title"> <?php echo $name; ?> </h3>
                <h4>Prix</h4>
                <p class="card-text"> <?php echo $description; ?></p>
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </div>
  <!--end .container-->

</body>

</html>