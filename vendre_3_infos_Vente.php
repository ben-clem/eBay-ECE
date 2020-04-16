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
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Page title -->
    <title>eBay ECE - Vendre</title>
</head>

<body>
    <div class="page-container">

        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-ece px-0" style="height: 80px;">
            <div class="container-fluid p-0">
                <a class="navbar-brand ml-3" href="index.html">eBay ECE</a>
                <ul class="navbar-nav" id="acheterVendre">
                    <li class="nav-item mx-3 my-0 fs1p1rem" style="position: relative; right: 1px;">
                        <a class="nav-link" href="nosProduits.html"><button type="button" class="btn btn-outline-light">Acheter</button></a>
                    </li>
                    <li class="nav-item mx-3 my-0 fs1p1rem" style="position: relative; left: 1px;">
                        <a class="nav-link" href="vendre.html"><button type="button" class="btn btn-outline-light">Vendre</button></a>
                    </li>
                </ul>
                <ul class="navbar-nav navElemRight">
                    <li class="nav-item mx-3 px-0" style="width: fit-content; position: relative; left: 22px">
                        <a class="nav-link mx-0 px-0" href="panier.html" style="width: fit-content;">
                            Mon Panier
                            <svg class="bi bi-bag" width="35px" height="35px" viewBox="-1 2.5 20 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd" />
                                <path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item mr-2 ml-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon Compte
                            <svg class="bi bi-person" width="30px" height="35px" viewBox="0 2 15 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item text-center" href="connexion.html">Connexion</a>
                            <a class="dropdown-item text-center" href="profil.html">Profil</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="height: 24px;"></div>
        <!-- Fin Nav -->




        <div class="content-wrap container">
            <div class="row">
                <div class="col-sm-10 m-5 border border-primary mx-auto">

                    <!-- Form enchère -->
                    <form name="form" action="vendre_4_postDB.php" method="post" enctype="multipart/form-data" id="vendre" onsubmit="return validateForm()" required>

                        <!-- On récupère les données -->
                        <?php
                        $nom = $_POST['nom'];
                        $categorie = $_POST['categorie'];
                        $description = $_POST['description'];
                        $typeVente = $_POST['typeVente'];
                        $urlPhotos = $_POST['result'];  //array with les urls des photos
                        
                        // On va upload la vidéo
                        

                            // Check filesize
                            if ($_FILES['video']['size'] > 5000000) {
                                die('File uploaded exceeds maximum upload size.');
                            }

                            // Check if the file exists
                            if (file_exists('databaseVideos/' . $_FILES['video']['name'])) {
                                //Si le fichier existe déjà (son nom du moins), on va rajouter un chiffre
                                $name = pathinfo($_FILES['video']['name'], PATHINFO_FILENAME);

                                $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

                                $increment = '1'; //start with no suffix

                                error_log("le fichier existe déjà");

                                error_log("name: $name, extension: $extension");

                                while (file_exists("databaseVideos/" . $name . $increment . '.' . $extension)) {
                                    $increment++;
                                    error_log("lOn incrémente");
                                }

                                $newName = $name . $increment . '.' . $extension;
                                error_log("newName: $newName");
                                $newFilePath = "databaseVideos/" . $newName;
                                error_log("lOn réécrit");
                                    
                                $tmpFilePath = $_FILES['video']['tmp_name'];
                                    //Upload the file into the temp dir
                                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                                        //Handle other code here
                                        echo "vidéo envoyée";
                                    }
                                    $urlVideo = $newFilePath; //On récupère l'url de la vidéo

                            } else {

                                //Get the temp file path
                                $tmpFilePath = $_FILES['video']['tmp_name'];

                                //Make sure we have a file path
                                if ($tmpFilePath != "") {
                                    //Setup our new file path
                                    $newFilePath = "databaseVideos/" . $_FILES['video']['name'];
                                    
                                    //Upload the file into the temp dir
                                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                                        //Handle other code here
                                        echo "vidéo envoyée";
                                    }
                                    $urlVideo = $newFilePath; //On récupère l'url de la vidéo
                                }
                            }
                        
                        

                            //On passe l'url de la vidéo
                            echo '<input type="hidden" name="urlVideo[]" value="'. $urlVideo. '">';

                            //On passe les urls des photos
                          foreach($urlPhotos as $value) {
                        echo '<input type="hidden" name="urlPhotos[]" value="'. $value. '">';
                        }
                        ?>

                        <?php
                        echo "$nom";
                        echo "$categorie";
                        echo "$description";
                        echo "typeVente: $typeVente";
                        ?>

                        

                        


                        <?php
                        if ($typeVente == "100" or $typeVente == "110") {
                        ?>
                            <table class="mx-auto my-3 border border-success">
                                <tr>
                                    <td colspan="2" class="mx-auto text-center pt-3">
                                        <h5>Infos Enchère</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1"><label class="ml-auto mr-1" for="prixDepart">Prix de départ :</label></td>
                                    <td class="p-1"><input required type="number" name="prixDepart" placeholder="5€"></td>
                                </tr>
                                <tr>
                                    <td class="p-1"><label class="ml-auto mr-1" for="dateDebut">Date de début :</label></td>
                                    <td class="p-1"><input required type="datetime-local" name="dateDebut"></td>
                                </tr>
                                <tr>
                                    <td class="p-1"><label class="ml-auto mr-1" for="dateFin">Date de fin :</label></td>
                                    <td class="p-1"><input required type="datetime-local" name="dateFin"></td>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>

                        <?php
                        if ($typeVente == "010" || $typeVente == "110" || $typeVente == "011") {
                        ?>
                            <table class="mx-auto my-3 border border-danger">
                                <tr>
                                    <td colspan="2" class="mx-auto text-center pt-3">
                                        <h5>Infos Achat Immédiat</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1"><label class="ml-auto mr-1" for="prixAchImm">Prix Achat Immédiat :</label></td>
                                    <td class="p-1"><input type="number" name="prixAchImm" placeholder="500€"></td>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>

                        <?php
                        if ($typeVente == "001" or $typeVente == "011") {
                        ?>
                            <table class="mx-auto my-3 border border-dark">
                                <tr>
                                    <td colspan="2" class="mx-auto text-center pt-3">
                                        <h5>Infos Meilleure Offre</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="mx-auto text-center pt-3">
                                        <p>Les acheteurs vont pouvoir vous faire des offres. Vous pourrez alors accepter ou proposer une contre offre. Si vous arrivez à un terrain d'entente au bout de 5 échanges, la vente aura lieu.</p>
                                    </td>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>



                        <table class="mx-auto my-3">
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="button" value="Mettre la vente en ligne">
                                </td>
                            </tr>
                        </table>

                        <input type="hidden" name="nom" value="<?php print $nom ?>">
                        <input type="hidden" name="categorie" value="<?php print $categorie ?>">
                        <input type="hidden" name="description" value="<?php print $description ?>">
                        <input type="hidden" name="typeVente" value="<?php print $typeVente ?>">

                    </form>


                </div>
            </div>
        </div>

        <!-- Script pour vérifier que le nom a bien été rempli
    <script>
        function validateForm() {
            var x = document.forms["form"]["Name"].value;
            if (x == "" || x == null) {
                alert("Name must be filled out");
                return false;
            }
        }
    </script> -->


        <!-- Footer -->
        <footer class="navbar-dark bg-ece mb-0 px-2 pt-3 pb-1">
            <h6 class="white">NOUS CONTACTER</h6>
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
            <div class="row">
                <p class="white mx-auto my-0 py-0" id="copyright">Copyright &copy; 2020 eBay ECE Inc. Tous droits réservés à
                    l'ECE Paris-Lyon.</p>
            </div>
        </footer>
        <!-- fin Footer -->
    </div>
    <!-- links to bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>