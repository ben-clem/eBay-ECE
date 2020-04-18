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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> <!-- ! Bien mettre après le 4.4.1 pour pas override tout (sert pour les icônes de la navbar) -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Page title -->
    <title>eBay ECE - Vendre</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-container">
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
                            <a href="inscription.php">S'inscrire</a>
                            <a href="admin.php">Admin</a>
                        </div>
                    </div>
                    <a href="panier.php">Mon panier <span class="glyphicon glyphicon-shopping-cart"></span></a>
                </div>
            </div>
        </header>
        <!-- Fin Nav -->



        <div class="content-wrap container">
            <div class="row">
                <div class="col-sm-10 m-5 border border-primary mx-auto">

                    <!-- Form enchère -->
                    <form name="form" action="vendre_2_2_video.php" method="post" enctype="multipart/form-data" id="vendrePP" onsubmit="return validateForm()" required>

                        <!-- On récupère les données -->
                        <?php
                        $nom = $_POST['Name'];
                        $categorie = $_POST['Categorie'];
                        $description = $_POST['description'];
                        $typeVente = $_POST['typeVente'];
                        ?>

                        <input type="hidden" name="nom" value="<?php print $nom ?>">
                        <input type="hidden" name="categorie" value="<?php print $categorie ?>">
                        <input type="hidden" name="description" value="<?php print $description ?>">
                        <input type="hidden" name="typeVente" value="<?php print $typeVente ?>">


                        <!-- On fait passer -->
                        <table class="mx-auto my-3">
                            <tr>
                                <td>
                                    <!-- On upload les photos -->
                                    <label for="photos[]">Choisissez des <strong>photos</strong> de votre produit :</label>
                                </td>
                                <td>
                                    <input type="file" name="photos[]" accept="image/*" id="upload" multiple>
                                </td>
                            </tr>
                            <tr class="pb-2">
                                <td colspan="2" class="pb-2">
                                    <h6 style="text-align: center; position: relative; right: 25px;" class="pb-2">(Nombre de photos max : 4)</h6>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="button" value="Ajouter photos" id="submit" class="mx-20 my-3">
                                </td>
                            </tr>
                        </table>

                        <!-- Script JS pour désactiver le bouton tant qu'on a pas choisi entre 1 et 4 photos -->
                        <script type="text/javascript">
                            $(function() {

                                var // Define maximum number of files.
                                    max_file_number = 4,
                                    // Define your form id or class or just tag.
                                    $form = $('#vendrePP'),
                                    // Define your upload field class or id or tag.
                                    $file_upload = $('#upload', $form),
                                    // Define your submit class or id or tag.
                                    $button = $('#submit', $form);

                                // Disable submit button on page ready.
                                $button.prop('disabled', 'disabled');

                                $file_upload.on('change', function() {
                                    var number_of_images = $(this)[0].files.length;
                                    if (number_of_images > max_file_number) {
                                        alert(`Vous ne pouvez pas envoyer plus de ${max_file_number} photos.`);
                                        $(this).val('');
                                        $button.prop('disabled', 'disabled');
                                    } else {
                                        $button.prop('disabled', false);
                                    }
                                });
                            });
                        </script>

                    </form>



                </div>
            </div>
        </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>