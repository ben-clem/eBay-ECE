<?php
error_log("----------------------------------------------------------------------------------------------------");
error_log("Début index.php");
session_start();
error_log("id_user_session :" . $_SESSION['id_user'])
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

    <!-- links to bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- links to bootstrap style sheet and my own style sheet
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> -->

    <!-- links to bootstrap style sheet and my own style sheet -->
    <!-- A NE PAS RECUPERER, MARCHE PAR MAGIE -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index_vendeur.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript">
        function deconnect() {

            window.location.replace("deconnexion.php");
        }
    </script>
    <!-- Page title -->
    <title>eBay ECE - Accueil</title>

</head>

<body>
    <!-- nav vendeur -->
    <header class="page-header header container-fluid my-3 mb-5">
        <div class="topnav">
            <a href="index.php"> <span class="glyphicon glyphicon-home"></span> </a>
            <div class="dropdown">
                <a class="dropbtn" href="vendre_1_infos_Item.php"> Ajouter un article </a>
            </div>



            <div class="topnav-right">
                <div class="dropdown">
                    <button class="dropbtn">
                        <p> <?php if (isset($_SESSION['id_user'])) {
                                echo "Bonjour, ";
                                echo $_SESSION['Firstname'];
                            } else {
                                echo "Mon Compte Vendeur";
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

                        <a href="admin.php">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- fin nav vendeur -->

    <div id="nav">
        <div class="container">

            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="img/enc.jpg" class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                Marcus Doe
                            </div>

                        </div>
                        <!-- END SIDEBAR USER TITLE -->


                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-home"></span>
                                        55 rue du Faubourg St Honore 75008 Paris </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                        06 61 02 03 04 </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="glyphicon glyphicon-credit-card"></i>
                                        Consulter ou modifier mes coordonees bancaires </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="glyphicon glyphicon-cog"></i>
                                        Mes preferences </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>

            </div>


            <!-- Laissez vous tenter : -->

        </div>

    </div>
    <div class="text-center">
        <br>
        <h6 id="titre"> Vos articles </h6><br>
        <div class="my-5">
            <a class="btn-lg btn-success" href="vendre_1_infos_Item.php">
                Ajouter un article
            </a>
        </div>
    </div>
    <div class="row mx-5 my-10">

        <!-- <div class="col-sm-4 portfolio-item">
            <div class="card h-auto">
                <h6 class=" mx-auto my-2 px-2" id="second"><a class="link-black" href="#">venteUne1</a>
                </h6>
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            </div>
        </div>

        <div class="col-sm-4 portfolio-item">
            <div class="card h-auto">
                <h6 class=" mx-auto my-2 px-2" id="second"><a class="link-black" href="#">venteUne2</a>
                </h6>
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            </div>
        </div>

        <div class="col-sm-4 portfolio-item">
            <div class="card h-auto">
                <h6 class=" mx-auto my-2 px-2" id="second"><a class="link-black" href="#">venteUne3</a>
                </h6>
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            </div>
        </div> -->
    </div>


</body>

</html>