<?php session_start(); ?>
<!-- On lance la session -->
<!DOCTYPE html>
<html lang="fr">
<!-- specify primary language for Search Engines (en, fr...) -->

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
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript">
        function deconnect() {
                
            window.location.replace("http://localhost/EBay-ECE/deconnexion.php");
        }
      
    </script>
    <!-- Page title -->
    <title>Admin - eBay ECE</title>

</head>

<body>
    <div class="page-container">
        <!-- Navigation -->
       <header class="page-header header container-fluid my-3 mb-5">
            <div class="topnav">
                <a href="index_admin.php"> <span class="glyphicon glyphicon-home"></span> </a>
                <div class="dropdown">
                    <a class="dropbtn" href="vendre_1_infos_Item.php"> Ajouter un article </a>
                </div>
                <div class="dropdown">
                    <a class="dropbtn" href="supprimer_item.php">Supprimer un article</a>
                </div>
                <div class="dropdown">
                    <a class="dropbtn" href="ajout_vendeur.php">Ajouter un vendeur</a>
                </div>

                <div class="dropdown">
                    <a class="dropbtn" href="supprimer_vendeur.php">Supprimer un vendeur</a>
                </div>

                <div class="topnav-right">
                    <div class="dropdown">
                        <button class="dropbtn">
                            <p> <?php if (isset($_SESSION['id_user'])) {
                                    echo "Bonjour, ";
                                    echo $_SESSION['Firstname'];
                                } else {
                                    echo "Mon Compte Admin";
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
                </div>
            </div>
        </header>
        <!-- Fin Nav -->

        <?php
        error_log("----------------------------------------------------------------------------------------------------");
        error_log("Début admin.php");
        ?>

        <!-- Début main container -->
        <div class="content-wrap container">

            <h2 class="text-center">Supprimer un article</h2><br>

            <!-- Form pour supprimer un item de la BDD -->
            <form name="deleteItem" id="deleteItem" action="admin.php" method="post">
                <table class="w-100 text-center mx-auto my-2">
                   
                    <tr>
                        <td class="w-50 p-2 text-right">
                            <label class="text-left align-middle pl-2" for="selectVendor">Sélectionner dans la BDD :</label>
                        </td>
                        <td class="p-2 text-left">
                            <select name="selectItem" id="selectItem">
                                <option value="" disabled selected>Choisir un Item à supprimer</option> <!-- Il faut qu'on aille chercher tous les vendeurs de la BDD pour les afficher en tant qu'options -->
                                <?php
                                // Accès DB
                                $servername = "localhost";
                                $username = "benzinho";
                                $dbpassword = "75011";
                                $dbname = "eBay ECE";

                                try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
                                    // set the PDO error mode to exception
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $stmt = $conn->prepare("SELECT Id_Item, Name, Category, Sale_Type, Sold, Video_Path, Description, Begin_Date, End_Date, Price_Min, Price_Now, ID_Seller, ID_Buyer
                                                            FROM Item
                                                            ORDER BY ID_Item");
                                    $stmt->execute();

                                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);

                                    while ($row = $stmt->fetch()) {
                                        // print $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";

                                        echo "<option value='$row[0]'>$row[0] - $row[1] - $row[2] - $row[3] - $row[4] - $row[5] - $row[6] - $row[7] - $row[8] - $row[9] - $row[10] - $row[11] - $row[12]</option>";
                                    }
                                } catch (PDOException $e) {
                                    // roll back the transaction if something failed
                                    $conn->rollback();
                                    error_log("Error: " . $e->getMessage());
                                }

                                // On se déconnecte
                                $conn = null;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="p-2 text-center"><input required type="submit" name="submit" value="Supprimer Item"></td>
                    </tr>
                </table>

                <!-- Delete Item DB -->
                <?php
                // Traitement des données
                $itemDelete = $_POST['selectItem'];

                // Debug console
                error_log("itemDelete : $itemDelete.");

                // upload DB
                $servername = "localhost";
                $username = "benzinho";
                $dbpassword = "75011";
                $dbname = "eBay ECE";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // begin the transaction
                    $conn->beginTransaction();

                    // our SQL statements
                    if (!empty($itemDelete)) { // Si les champs sont bien remplis
                        // On delete dans la DB
                        $conn->exec("DELETE FROM Item WHERE ID_Item = '$itemDelete'");

                        // commit the transaction
                        $conn->commit();

                        error_log("Suppression réussie.");

                        echo "<h5 class='text-center'>Item correctement supprimé 👍.<br>
                                                        (la page va se recharger)</h5>";

                        echo '<meta http-equiv="refresh" content="3; URL=admin.php" />'; /* Refresh la page au bout de 3 secondes */
                    }
                } catch (PDOException $e) {
                    // roll back the transaction if something failed
                    $conn->rollback();
                    error_log("Error: " . $e->getMessage());
                    echo "<h5 class='text-center'>Il y a eu une erreur 😰.</h5>";
                }

                // On se déconnecte
                $conn = null;
                ?>
            </form>

        </div>
        <!-- Fin main container -->

        <?php
        error_log("Fin admin.php");
        error_log("----------------------------------------------------------------------------------------------------");
        ?>

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
    <!-- links to bootstrap JS dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>