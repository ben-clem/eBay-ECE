<?php
error_log("----------------------------------------------------------------------------------------------------");
error_log("Début shop-item.php");
session_start();
error_log("id_user_session : " . $_SESSION['id_user'])
?>
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
	<link href="css/shop-item.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300)">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<style>
		.carousel-indicators li {
			border: solid 2px lightgrey;
			margin: 2px;
			position: relative;
			top: 20px;
		}

		.carousel-indicators .active {
			background-color: red;
		}

		.carousel-item {
			border-radius: 0;
		}
	</style>

	<script type="text/javascript">
		function achatImm() {

			var x = 0;
			<?php
			if (empty($_SESSION['id_user'])) {  //Si pas connecté
				echo 'window.location.href = "connexion.php";'; /* Redirige vers connexion */
				echo "var x = 1;";
			}
			?>

			if (x === 0) {
				if (confirm("   Etes-vous sûr ?\n   Cliquez pour être redirigé au payement.")) {
					//redirect payement
				} else {
					//rien
				}
			}
		}

		function encherir() {

			var x = 0;
			<?php
			if (empty($_SESSION['id_user'])) {  //Si pas connecté
				echo 'window.location.href = "connexion.php";'; /* Redirige vers connexion */
				echo "var x = 1;";
			}
			?>

			if (x === 0) {
				var enchere;

				if (enchere = prompt("Combien voulez vous enchérir pour ce produit?")) {
					//envoyer var "enchere".
					alert("Merci ! Nous avons bien enregistré votre enchère");
				} else {
					//rien
				}
			}
		}

		function offre() {


			var x = 0;
			<?php
			if (empty($_SESSION['id_user'])) {  //Si pas connecté
				echo 'window.location.href = "connexion.php";'; /* Redirige vers connexion */
				echo "var x = 1;";
			}
			?>

			if (x === 0) {
				var offre;

				if (enchere = prompt("Quel est le montant de votre offre pour ce produit?")) {
					//envoyer var offre
					alert("Merci ! Nous avons bien transmis votre offre au vendeur");
				} else {
					//rien
				}
			}
		}

		function deconnect() {

			window.location.replace("http://localhost/EBay-ECE/deconnexion.php");
		}
	</script>

</head>

<body>
	<div class="page-container">
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

		<div class="content-wrap">
			<!-- D'abord on va chercher les infos de l'item dans la DB -->
			<?php
			// Accès DB
			$servername = "localhost";
			$username = "benzinho";
			$dbpassword = "75011";
			$dbname = "eBay ECE";

			//On récupère l'id de l'item
			$id = $_GET['id'];
			error_log("id : $id");

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// begin the transaction
				$conn->beginTransaction();

				$stmt = $conn->prepare("SELECT * FROM Item AS It
																			LEFT JOIN Images AS Im ON It.Id_Item = Im.Id_Item
																			WHERE It.Id_Item = '$id'");
				// Ne marche pas sans le ON 
				// ou sans les ''
				// ni sans le dernier It

				$stmt->execute();

				$result = $stmt->setFetchMode(PDO::FETCH_NUM);

				$tour = 0;
				while ($row = $stmt->fetch()) {

					if ($row[0] != $i) {  ///Pour le premier match seulement

						$id = $row[0];
						$name = $row[1];
						$category = $row[2];
						$sale_type = $row[3];
						$sold = $row[4];
						$videoPath = $row[5];
						$description = $row[6];
						$beginDate = $row[7];
						$endDate = $row[8];
						$priceMin = $row[9];
						$priceNow = $row[10];
						$idSeller = $row[11];


						error_log("name: $name, category: $category, saleType: $sale_Type, sold: $sold, videoPath: $videoPath,
											descriuption: $description, beginDate: $beginDate, endDate: $endDate, priceMin: $priceMin, priceNow: $priceNow, idSeller: $idSeller");
					}
					$i = $row[0];

					//Pour les autres
					$photosPath[$tour] = $row[13];
					error_log("photosPath[$tour] : $photosPath[$tour]");
					$tour++;
				}

				$photo1 = $photosPath[0];

			} catch (PDOException $e) {
				// roll back the transaction if something failed
				$conn->rollback();
				error_log("Error: " . $e->getMessage());
				echo "<h5 class='text-center'>Erreur.</h5>";
			}

			// On se déconnecte
			$conn = null;
			?>


			<!-- ON PASSE MAINTENANT A L'AFFICHAGE -->


			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<h1 class="my-4"><?php echo $name; ?> </h1> <br>
						<div class="list-group">

							<!-- ENCHERES SEULEMENT-->
							<?php if ($sale_type == '100') { ?>
								<button class="list-group-item" onclick="encherir()">
									<div class="bouton">Enchérir</div> <br>
									<div class="info">
										<p style="font-size: 120%;">
											Date de début :<br><?php echo "$beginDate"; ?> <br><br>
											Date de fin :<br><?php echo "$endDate"; ?> <br><br>
											Prix Minimum :<br><?php echo "$priceMin"; ?>€ <br><br>
										</p>
									</div>
								</button>
							<?php } ?>

							<!-- ENCHERES et ACHAT IMMEDIAT-->
							<?php if ($sale_type == '110') { ?>

								<button class="list-group-item" onclick="achatImm()">
									<div class="bouton"> Achat Immédiat </div>
									<div class="info">
										<br>
										<p class="pb-3" style="font-size: 150%;">Prix : <span style="font-weight: bold!important;"><?php echo "$priceNow"; ?>€</span><br></p>

									</div>
								</button>
								<a href="panier.php?id=<?php

														$itemToPanier = array($id, $name, $description, $priceNow, $idSeller, $photo1);
														$_SESSION['pannier'][$id] = $itemToPanier;

														echo "$id";

														?>" style="z-index: 2000;" class="mx-auto mt-2"> Ajouter au panier </a> <br>

								<button class="list-group-item" onclick="encherir()">
									<div class="bouton">Enchérir</div> <br>
									<div class="info">
										<p style="font-size: 120%;">
											Date de début :<br><?php echo "$beginDate"; ?> <br><br>
											Date de fin :<br><?php echo "$endDate"; ?> <br><br>
											Prix Minimum :<br><?php echo "$priceMin"; ?>€ <br><br>
										</p>
									</div>
								</button>

							<?php } ?>

							<!-- ACHAT IMMEDIAT SEULEMENT -->
							<?php if ($sale_type == '010') { ?>
								<button class="list-group-item" onclick="achatImm()">
									<div class="bouton"> Achat Immédiat </div>
									<div class="info">
										<br>
										<p class="pb-3" style="font-size: 150%;">Prix : <span style="font-weight: bold!important;"><?php echo "$priceNow"; ?>€</span><br></p>

									</div>
								</button>
								<a href="panier.php?id=<?php

														$itemToPanier = array($id, $name, $description, $priceNow, $idSeller, $photo1);
														$_SESSION['pannier'][$id] = $itemToPanier;

														echo "$id";

														?>" style="z-index: 2000;" class="mx-auto mt-2"> Ajouter au panier </a> <br>
							<?php } ?>

							<!-- OFFRE SEULEMENT-->
							<?php if ($sale_type == '001') { ?>

								<button class="list-group-item" onclick="offre()">
									<div class="bouton">Faire une offre directe au vendeur</div>
								</button>
							<?php } ?>

							<!-- OFFRE et ACHAT-->
							<?php if ($sale_type == '011') { ?>
								<button class="list-group-item" onclick="achatImm()">
									<div class="bouton"> Achat Immédiat </div>
									<div class="info">
										<br>
										<p class="pb-3" style="font-size: 150%;">Prix : <span style="font-weight: bold!important;"><?php echo "$priceNow"; ?>€</span><br></p>

									</div>
								</button>
								<a href="panier.php?id=<?php

														$itemToPanier = array($id, $name, $description, $priceNow, $idSeller, $photo1);
														$_SESSION['pannier'][$id] = $itemToPanier;

														echo "$id";

														?>" style="z-index: 2000;" class="mx-auto mt-2"> Ajouter au panier </a> <br>

								<button class="list-group-item" onclick="offre()">
									<div class="bouton">Faire une offre directe au vendeur</div>
								</button>
							<?php } ?>


						</div>
					</div>
					<!-- /.col-lg-3 -->

					<div class="col-lg-9">

						<div class="card mt-4 mb-5" style="border-radius: 10px;">
							<!-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> -->
							<!-- CAROUSSEL -->
							<header>
								<div id="carouselExampleIndicators" class="carousel slide" data-interval="false" data-ride="carousel" data-pause="hover">
									<ol class="carousel-indicators">
										<?php
										$countItems = count($photosPath) + count($videoPath);
										for ($x = 0; $x < $countItems; $x++) {
											if ($x == 0) {
												echo "<li data-target='#carouselExampleIndicators' data-slide-to='$x' class='active'></li>";
											} else {
												echo "<li data-target='#carouselExampleIndicators' data-slide-to='$x'></li>";
											}
										}
										?>
									</ol>

									<div class="carousel-inner" role="listbox">
										<!-- Slides du carousel en fonction du nombre d'images + vidéo -->
										<?php

										foreach ($photosPath as $path) {

										?>
											<!-- Slide X - Set the background image for this slide in the line below -->
											<div class="carousel-item <?php if ($path == $photosPath[0]) {
																			echo "active";
																		} ?>" style="background-image: url('<?php echo "$path"; ?>'); border-radius: 10px 10px 0px 0px;">
												<div class="carousel-caption d-none d-md-block">
												</div>
											</div>
										<?php

										}

										if (!empty($videoPath)) {
										?>
											<!-- Slide vidéo -->
											<div class="carousel-item" style="max-height: 500px; border-radius: 10px 10px 0px 0px;">
												<div class="embed-responsive embed-responsive-16by9">
													<video height="500px" controls style="position: absolute; z-index: 0; left: 0px; overflow: hidden; opacity: 1; user-select: none; margin-top: 0px; max-width: initial;">
														<source src="<?php echo "$videoPath"; ?>" type="video/mp4">
													</video>
												</div>
											</div>
										<?php
										}

										?>


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

								<p class="card-text"> <?php echo $description; ?></p>
								<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
								4.0 stars
							</div>
						</div>

					</div>

				</div>
			</div>


			<!-- FIN AFFICHAGE -->
		</div>

		<?php
		error_log("Fin shop-item.php");
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

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>