<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>crud dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/boo	tstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
	<!--picture title-->
	<link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">


	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>



	<div class="wrapper">
		<div class="body-overlay"></div>

		<!-- Sidebar -->
		<div id="sidebar">
			<div class="sidebar-header">
				<h3><img src="img/Logo_ofppt.png" class="img-fluid" alt="Logo OFPPT" /><span>Ofppt</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="active">
					<a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard</a>
				</li>
				<li class="dropdown">
					<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">apps</i><span>Les baces</span>
					</a>
					<ul class="collapse list-unstyled menu" id="pageSubmenu2">
						<li>
							<a href="accepter.php"><i class="material-icons">done</i>Stagiaires acceptés</a>
						</li>
						<li>
							<a href="sauvgarde.php"><i class="material-icons">bookmark</i>Sauvegarde</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="acc.php"><i class="material-icons">account_circle</i> Accounts</a>
				</li>
				<li>
					<a href="files.php"><i class="material-icons">description</i>files</a>
				</li>
				<li>
					<a href="indexmail.php"><i class="material-icons">message</i> Message</a>
				</li>
				<li>
					<a href="login.php"><i class="material-icons">logout</i>Logout</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="content">
		<div class="top-navbar">
			<div class="xd-topbar">
				<div class="row">
					<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
						<div class="xp-menubar">
							<span class="material-icons text-white custom-icon">signal_cellular_alt</span>
						</div>
					</div>
					<!-- Start XP Col -->
					<div class="col-md-5 col-lg-3 order-3 order-md-2">
					</div>
					<!-- End XP Col -->


					<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
						<div class="xp-profilebar text-right">
							<nav class="navbar p-0">
								<ul class="nav navbar-nav flex-row ml-auto">

									<li class="dropdown nav-item">
										<a class="nav-link" href="#" data-toggle="dropdown">
											<img src="img/user1.png" style="width:40px; border-radius:50%;" />
											<span class="xp-user-live"></span>
											<style>
												.xp-user-live {
													background-color: blue;
													animation: changeColor 1s ease-in-out 1s forwards;
												}

												@keyframes changeColor {
													to {
														background-color: red;
													}
												}
											</style>
										</a>

									</li>


								</ul>
							</nav>
						</div>
					</div>

				</div>

				<div class="xp-breadcrumbbar text-center">
					<h4 class="page-title">Gestion des inscriptions des stagiaires</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">OFPPT</a></li>
						<li class="breadcrumb-item active" aria-current="page">ISGI</li>
					</ol>
				</div>
				<div>
				</div>


			</div>
		</div>
		<!------top-navbar-end----------->

		<?php
		include_once("connexion.php");

		// Nombre total de lignes dans votre tableau
		$query2 = "SELECT COUNT(*) as count FROM stagiaires";
		$count_2 = $connexion->query($query2);
		$registeredCount = $count_2->fetch()['count'];

		// Nombre total de lignes dans votre tableau
		$query3 = "SELECT COUNT(*) as count FROM accepter";
		$count_3 = $connexion->query($query3);
		$acceptedCount = $count_3->fetch()['count'];

		// Nombre total de lignes dans votre tableau
		$query4 = "SELECT COUNT(*) as count FROM sauvegarde_stagiaires";
		$count_4 = $connexion->query($query4);
		$nonAcceptedCount = $count_4->fetch()['count'];
		$needed = 100;
		$neededInterns = $needed - $acceptedCount;

		?>

		<!------main-content-start----------->

		<div class="main-content">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrapper">
						<style>
							.statice {
								display: flex;
								justify-content: space-between;
								align-items: center;
								background-color: #0000;
								padding: 20px;
								border-radius: 10px;
								margin-bottom: 20px;
							}

							.statice div {
								flex: 1;
								background-color: #ffffff;
								border: 1px solid #ddd;
								padding: 10px;
								margin: 0 10px;
								text-align: center;
								border-radius: 5px;
							}
						</style>

						<div class="statice">
							<div class="bg-primary text-white">Stagiaires inscrits : <?php echo $registeredCount; ?></div>
							<div class="bg-danger text-white">Stagiaires acceptés : <?php echo $acceptedCount; ?></div>
							<div class="bg-success text-white">Stagiaires non acceptés : <?php echo $nonAcceptedCount; ?></div>
							<div class="bg-secondary text-white">Nombre nécessaires : <?php echo $neededInterns; ?></div>
						</div>

						<style>
							#form1,
							#form2 {
								display: flex;
							}

							.shared-button {
								padding: 0.3rem 0.4rem;
								margin: 0.1rem;
								font-size: 0.675rem;
								width: 100px;
								display: flex;
								justify-content: center;
								align-items: center;
							}

							#desbutton {
								display: flex;
							}

							.statice {
								display: flex;
								justify-content: space-between;
								margin-top: 20px;
							}

							.statice div {
								background-color: #f8f9fa;
								border: 1px solid #dee2e6;
								padding: 10px;
								width: 23%;
								text-align: center;
								font-size: 1rem;
								border-radius: 5px;
							}
						</style>
						<div class="table-title">
							<div class="row">
								<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
									<h2 class="ml-lg-2">Gestion des inscriptions des stagiaires</h2>
								</div>
								<!-- <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="addstagaire.php" class="btn btn-success">
										<span>Ajouter Nouveau Stagaires</span>
									</a>
								</div> -->


							</div>
						</div>

						<?php
						include_once("connexion.php");

						// Nombre total de lignes dans votre tableau
						$query_count = "SELECT COUNT(*) as total FROM stagiaires";
						$count_statement = $connexion->query($query_count);
						$total_rows = $count_statement->fetch()['total'];

						// Nombre de lignes à afficher par page
						$rows_per_page = 6;

						// Calculer le nombre total de pages
						$total_pages = ceil($total_rows / $rows_per_page);

						// Récupérer le numéro de page actuel
						$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

						// Calculer l'index de début pour la requête SQL en fonction du numéro de page actuel
						$start_index = ($current_page - 1) * $rows_per_page;

						if (isset($_POST['delete'])) {
							// Récupérer les détails du stagiaire avant de le supprimer
							$cin = $_POST['delete'];
							$query_select = "SELECT cin, nom, prenom, genre, tel, adresse, ddn FROM stagiaires WHERE cin = :cin";
							$stmt_select = $connexion->prepare($query_select);
							$stmt_select->execute(['cin' => $cin]);
							$stagiaire = $stmt_select->fetch(PDO::FETCH_ASSOC);

							// Insérer les détails dans la table sauvegarde_stagiaires
							if ($stagiaire) {
								$query_insert = "INSERT INTO sauvegarde_stagiaires (cin, nom, prenom, genre, tel, adresse, ddn) VALUES (:cin, :nom, :prenom, :genre, :tel, :adresse, :ddn)";
								$stmt_insert = $connexion->prepare($query_insert);
								$stmt_insert->execute([
									'cin' => $stagiaire['cin'],
									'nom' => $stagiaire['nom'],
									'prenom' => $stagiaire['prenom'],
									'genre' => $stagiaire['genre'],
									'tel' => $stagiaire['tel'],
									'adresse' => $stagiaire['adresse'],
									'ddn' => $stagiaire['ddn']
								]);
							}

							// Supprimer le stagiaire de la table stagiaires
							$query_delete = "DELETE FROM stagiaires WHERE cin = :cin";
							$stmt_delete = $connexion->prepare($query_delete);
							$stmt_delete->execute(['cin' => $cin]);
						}
						// Vérification si la requête POST 'accepterstagiaire' est reçue
						if (isset($_POST['accepterstagiaire'])) {
							// Récupération du cin du stagiaire
							$cin = $_POST['accepterstagiaire'];

							// Récupération des détails du stagiaire
							$query_select = "SELECT * FROM stagiaires WHERE cin = :cin";
							$stmt_select = $connexion->prepare($query_select);
							$stmt_select->execute(['cin' => $cin]);
							$stagiaire = $stmt_select->fetch(PDO::FETCH_ASSOC);

							// Insertion dans la table "accepter"
							if ($stagiaire) {
								$query_insert = "INSERT INTO accepter (cin, nom, prenom, genre, tel, adresse, ddn) VALUES (:cin, :nom, :prenom, :genre, :tel, :adresse, :ddn)";
								$stmt_insert = $connexion->prepare($query_insert);
								$stmt_insert->execute([
									'cin' => $stagiaire['cin'],
									'nom' => $stagiaire['nom'],
									'prenom' => $stagiaire['prenom'],
									'genre' => $stagiaire['genre'],
									'tel' => $stagiaire['tel'],
									'adresse' => $stagiaire['adresse'],
									'ddn' => $stagiaire['ddn']
								]);
							}

							// Suppression de la table "stagiaires"
							$query_delete = "DELETE FROM stagiaires WHERE cin = :cin";
							$stmt_delete = $connexion->prepare($query_delete);
							$stmt_delete->execute(['cin' => $cin]);
						}


						// Faire votre requête SQL avec la pagination en utilisant $start_index et $rows_per_page pour limiter les résultats
						$query = "SELECT * FROM stagiaires LIMIT $start_index, $rows_per_page";
						$pdostmt = $connexion->query($query);
						$stagiaires = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
						?>


						<table class="table">
							<style>
								.thead {
									background-color: #353b48;
									color: white;
								}
							</style>
							<thead class="thead">
								<tr>
									<th>cin</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>genre</th>
									<th>tel</th>
									<th>Bac</th>
									<th>adresse</th>
									<th>date de naissance</th>
									<th>date d'inscription</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($stagiaires as $stagiaire) : ?>
									<tr>
										<td><?php echo htmlspecialchars($stagiaire['cin']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['nom']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['prenom']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['genre']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['tel']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['mdeb']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['adresse']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['ddn']); ?></td>
										<td><?php echo htmlspecialchars($stagiaire['ddi']); ?></td>
										<!-- Ajout du bouton de suppression -->
										<td>
											<style>
												#form1 {
													display: flex;
													font-size: large;
												}
												#form1 .btn {
													padding: 0.1rem 0.2rem;
													margin: 0.1rem 0.1rem;
													font-size: 0.675rem;
												}

												#form2 {
													display: flex;
													font-size: large;
												}

												#form2 .btn {
													padding: 0.1rem 0.2rem;
													margin: 0.1rem 0.1rem;
													font-size: 0.675rem;
												}

												#desbutton {
													display: flex;
												}
											</style>
											<div id="desbutton">
												<form id="form1" method="post">
													<!-- Bouton pour Modifier un stagiaire -->
													<a href="mst.php?id=<?php echo htmlspecialchars($stagiaire['cin']); ?>" class="btn btn-success">
														<span class="material-icons">&#xE254;</span>
													</a>
													<input type="hidden" name="delete" value="<?php echo htmlspecialchars($stagiaire['cin']); ?>">
													<!-- Bouton pour Supprimer un stagiaire -->
													<button type="submit" name="delete" value="<?php echo htmlspecialchars($stagiaire['cin']); ?>" class="btn btn-danger btn-sm" onclick="confirmDeletion(this);">
														<span class="material-icons">&#xE872;</span>
													</button>
												</form>
												<form id="form2" method="post">
													<!-- Bouton pour Valider un stagiaire -->
													<button type="submit" name="accepterstagiaire" value="<?php echo htmlspecialchars($stagiaire['cin']); ?>" onclick="confirmValidation()" class="btn btn-primary">
														<span class="material-icons">done</span>
													</button>
												</form>
											</div>

											<script>
												function confirmModification() {
													return confirm("Êtes-vous sûr de vouloir modifier ce stagaire ?");
												}

												function confirmDeletion() {
													return confirm("Êtes-vous sûr de vouloir supprimer ce stagaire ?");
												}

												function confirmValidation() {
													return confirm("Êtes-vous sûr de vouloir accepter ce stagaire ?");
												}
											</script>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<div class="clearfix">
							<div class="hint-text">showing <b><?php echo min($total_rows, $start_index + $rows_per_page); ?></b> out of <b><?php echo $total_rows; ?></b></div>
							<ul class="pagination">
								<li class="page-item <?php echo ($current_page == 1 ? 'disabled' : ''); ?>"><a href="?page=<?php echo ($current_page - 1); ?>" class="page-link">Précédent</a></li>
								<?php for ($page = 1; $page <= $total_pages; $page++) : ?>
									<li class="page-item <?php echo ($page == $current_page ? 'active' : ''); ?>"><a href="?page=<?php echo $page; ?>" class="page-link"><?php echo $page; ?></a></li>
								<?php endfor; ?>
								<li class="page-item <?php echo ($current_page == $total_pages ? 'disabled' : ''); ?>"><a href="?page=<?php echo ($current_page + 1); ?>" class="page-link">Suivant</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Fonction pour enregistrer l'état du menu dans le stockage local
			function saveMenuState(state) {
				localStorage.setItem('menuState', state);
			}

			// Fonction pour récupérer l'état du menu à partir du stockage local
			function getMenuState() {
				return localStorage.getItem('menuState');
			}

			// Fonction pour initialiser l'état du menu lors du chargement de la page
			function initMenuState() {
				var currentState = getMenuState();

				if (currentState === 'open') {
					$("#sidebar").addClass('active');
					$("#content").addClass('active');
				} else {
					$("#sidebar").removeClass('active');
					$("#content").removeClass('active');
				}
			}

			// Initialisation de l'état du menu
			initMenuState();

			// Gestion du clic sur le bouton de la barre de menu
			$(".xp-menubar").on('click', function() {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
				saveMenuState($("#sidebar").hasClass('active') ? 'open' : 'closed');
			});

			// Gestion du clic sur la barre de menu et l'overlay
			$('.xp-menubar, .body-overlay').on('click', function() {
				$("#sidebar, .body-overlay").toggleClass('show-nav');
			});
		});
	</script>
	<style>
		.no-scroll {
			overflow: hidden;
		}
	</style>





</body>

</html>