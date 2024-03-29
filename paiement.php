<?php
error_log("----------------------------------------------------------------------------------------------------");
error_log("Début paiement.php");
session_start();
$id_user = $_SESSION['id_user'];
error_log("id_user_session :" . $id_user);

if (!isset($_SESSION['id_user'])) {
	header('Location: connexion.php');
}

// ON SUPPRIME L'ITEM DU PANIER A SUPPRIMER
unset($_SESSION['pannier'][$_GET['deleteID']]);

// Total
$total = 0;

foreach ($_SESSION['pannier'] as $key => $value) {
	error_log(
		"id : $key,
        name : $value[1],
        description : $value[2],
        priceNow : $value[3],
        idSeller : $value[4],
        photo1 : $value[5]."
	);
	$total += $value[3];
	error_log("total : $total.");
}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">+
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- Custom styles for this template -->
	<link href="css/paiement.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

	<script type="text/javascript">
		function deconnect() {

			window.location.replace("deconnexion.php");
		}
	</script>
	<title>Paiement - eBay ECE</title>
</head>

<body class="bg-light">
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

			<!-- D'abord on va chercher les infos de l'acheteur dans la DB -->
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

				// begin the transaction
				$conn->beginTransaction();

				$stmt = $conn->prepare("SELECT * FROM BUYER WHERE ID_Buyer = '$id_user'");

				$stmt->execute();

				$result = $stmt->setFetchMode(PDO::FETCH_NUM);

				while ($row = $stmt->fetch()) {

					$firstName = $row[3];
					$name = $row[2];
					$address = $row[4];
					$titulaire = $row[5];
					$numero = $row[6];
					$exp = $row[7];
					$cvv = $row[8];
				}
			} catch (PDOException $e) {
				// roll back the transaction if something failed
				$conn->rollback();
				error_log("Error: " . $e->getMessage());
				echo "<h5 class='text-center'>Erreur.</h5>";
			}

			// On se déconnecte
			$conn = null;
			?>

			<div class="container">
				<div class="py-5 pt-0 text-center">
					<h2 class="my-0">Informations Paiement</h2>
				</div>

				<div class="row mb-5 pb-5">
					<div class="col-md-4 order-md-2 mb-4">
						<h4 class="d-flex justify-content-between align-items-center mb-3">
							<span class="text-muted">Votre Panier</span>
							<span class="badge badge-secondary badge-pill">3</span>
						</h4>
						<ul class="list-group mb-3">
							<?php
							foreach ($_SESSION['pannier'] as $key => $value) {
							?>
								<li class="list-group-item d-flex justify-content-between lh-condensed">
									<div>
										<h6 class="my-0"><?php echo "$value[1]"; ?></h6>
									</div>
									<span class="text-muted"><?php echo "$value[3]"; ?> €</span>
								</li>
							<?php
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
								<span>Total</span>
								<strong><?php echo "$total"; ?> €</strong>
							</li>
						</ul>
					</div>

					<div class="col-md-8 order-md-1">
						<h4 class="mb-3">Adresse de Livraison</h4>
						<form class="needs-validation" novalidate action="confirmation.php" method="post">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="firstName">Prénom</label>
									<input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo "$firstName"; ?>" required>
									<div class="invalid-feedback">
										Valid first name is required.
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="lastName">Nom de famille</label>
									<input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo "$name"; ?>" required>
									<div class="invalid-feedback">
										Valid last name is required.
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" placeholder="prenom.nom@edu.ece.fr" value="<?php echo "$id_user"; ?>">
								<div class="invalid-feedback">
									Please enter a valid email address for shipping updates.
								</div>
							</div>

							<div class="mb-3">
								<label for="address">Adresse</label>
								<input type="text" class="form-control" id="address" value="<?php echo "$address"; ?>" placeholder="Quai de Grenelle" required>
								<div class="invalid-feedback">
									Please enter your shipping address.
								</div>
							</div>

							<hr class="mb-4">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="same-address">
								<label class="custom-control-label" for="same-address">L'adresse de livraison est la même que l'adresse de facturation</label>
							</div>

							<hr class="mb-4">

							<h4 class="mb-3">Paiment</h4>

							<div class="d-block my-3">
								<div class="custom-control custom-radio">
									<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
									<label class="custom-control-label" for="credit">Credit card</label>
								</div>
								<div class="custom-control custom-radio">
									<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
									<label class="custom-control-label" for="debit">Debit card</label>
								</div>
								<div class="custom-control custom-radio">
									<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
									<label class="custom-control-label" for="paypal">Paypal</label>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="cc-name">Titulaire de la carte</label>
									<input type="text" class="form-control" id="cc-name" value="<?php echo "$titulaire"; ?>" required>
									<small class="text-muted">Nom complet comme indiqué sur la carte</small>
									<div class="invalid-feedback">
										Name on card is required
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="cc-number">Numéro de carte</label>
									<input type="text" class="form-control" id="cc-number" value="<?php echo "$numero"; ?>" required>
									<div class="invalid-feedback">
										Credit card number is required
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">Expiration</label>
									<input type="text" class="form-control" id="cc-expiration" value="<?php echo "$exp"; ?>" required>
									<div class="invalid-feedback">
										Expiration date required
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<label for="cc-expiration">CVV</label>
									<input type="text" class="form-control" id="cc-cvv" value="<?php echo "$cvv"; ?>" required>
									<div class="invalid-feedback">
										Security code required
									</div>
								</div>
							</div>
							<hr class="mb-4">
							<button class="btn btn-primary btn-lg btn-block" type="submit">Confirmer Paiement</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';

				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');

					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>

		<?php
		
		error_log("Fin paiement.php");
		error_log("----------------------------------------------------------------------------------------------------");
		?>

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

		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js" integrity="sha256-ifihHN6L/pNU1ZQikrAb7CnyMBvisKG3SUAab0F3kVU=" crossorigin="anonymous"></script>

	</div>
</body>

</html>