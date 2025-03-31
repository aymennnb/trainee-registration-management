<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>crud dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
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
				<li>
					<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard</a>
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
				<li class="active">
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


	<!-------sidebar--design- close----------->



	<!-------page-content start----------->

	<div id="content">


		<!------top-navbar-start----------->

		<div class="top-navbar">
			<div class="xd-topbar">
				<div class="row">
					<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
						<div class="xp-menubar">
							<span class="material-icons text-white custom-icon">signal_cellular_alt</span> <!--signal_cellular_alt-->
						</div>
					</div>
					<div class="col-md-5 col-lg-3 order-3 order-md-2">

					</div>


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
			</div>
		</div>
		<!------top-navbar-end----------->

		<!------main-content-start----------->

		<div class="main-content">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrapper">

						<div class="table-title">
							<div class="row">
								<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
									<h2 class="ml-lg-2">Gestion des accounts</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
									<input type="search" id="searchInput" class="form-control" style="border-radius: 10px; background-color:white;" placeholder="Rechercher par CIN">
								</div>
								<script>
									// Fonction pour filtrer les lignes de la table en fonction de la valeur de recherche
									function filterTable(searchValue) {
										// Convertir la valeur de recherche en minuscules pour une correspondance insensible à la casse
										searchValue = searchValue.toLowerCase();
										// Récupérer toutes les lignes de la table sauf l'en-tête
										var rows = document.querySelectorAll("#dataTable tbody tr");
										// Parcourir chaque ligne de la table
										rows.forEach(function(row) {
											// Récupérer la valeur de CIN dans cette ligne
											var cinValue = row.cells[1].textContent.trim().toLowerCase();
											// Afficher ou masquer la ligne en fonction de la correspondance avec la valeur de recherche
											if (cinValue.includes(searchValue)) {
												row.style.display = "";
											} else {
												row.style.display = "none";
											}
										});
									}

									// Attacher un gestionnaire d'événements pour déclencher la recherche lorsqu'une saisie est effectuée dans le champ de recherche
									document.getElementById("searchInput").addEventListener("keyup", function() {
										var searchValue = this.value.trim(); // Récupérer la valeur de recherche
										filterTable(searchValue); // Filtrer la table en fonction de la valeur de recherche
									});
								</script>


								<div></div>
							</div>
						</div>

						<?php
						include_once("connexion.php");

						// Nombre total de lignes dans votre tableau
						$query_count = "SELECT COUNT(*) as total FROM admins";
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
							$query = "DELETE FROM admins WHERE id = :id";
							$pdostmt = $connexion->prepare($query);
							$pdostmt->execute(['id' => $_POST['delete']]);
						}

						if (isset($_POST['view'])) {
							$view_email = $_POST['view'];
							// Vous pouvez ajouter votre logique pour afficher les détails supplémentaires ici.
							echo "<script>alert('Affichage des détails pour : $view_email');</script>";
						}

						// Faire votre requête SQL avec la pagination en utilisant $start_index et $rows_per_page pour limiter les résultats
						$query = "select id,cin,email, mdp, Roles, date_create_acc FROM admins LIMIT $start_index, $rows_per_page";
						$pdostmt = $connexion->query($query);
						$accounts = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
						?>

						<table class="table" id="dataTable">
							<style>
								.thead {
									background-color: #353b48;
									color: white;
								}
							</style>
							<thead class="thead">
								<tr>
									<th>Id</th>
									<th>Cin</th>
									<th>Email</th>
									<th>Mot de passe</th>
									<th>Rôles</th>
									<th>Date de création</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($accounts as $account) : ?>
									<tr>
										<td><?php echo htmlspecialchars($account['id']); ?></td>
										<td><?php echo htmlspecialchars($account['cin']); ?></td>
										<td><?php echo htmlspecialchars($account['email']); ?></td>
										<td><?php echo htmlspecialchars($account['mdp']); ?></td>
										<td><?php echo htmlspecialchars($account['Roles']); ?></td>
										<td><?php echo htmlspecialchars($account['date_create_acc']); ?></td>
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
											</style>
											<form id="form1" method="post">
												<!-- Bouton pour Supprimer un compte -->
												<button type="submit" name="delete" value="<?php echo htmlspecialchars($account['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirmDeletion();">
													<span class="material-icons">&#xE872;</span>
												</button>
											</form>

											<script>
												function confirmView() {
													return confirm("Êtes-vous sûr de vouloir afficher les détails de ce compte ?");
												}

												function confirmDeletion() {
													return confirm("Êtes-vous sûr de vouloir supprimer ce compte ?");
												}
											</script>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<div class="clearfix">
							<div class="hint-text">Affichage de <b><?php echo min($total_rows, $start_index + $rows_per_page); ?></b> sur <b><?php echo $total_rows; ?></b> entrées</div>
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



				<!-------complete html----------->






				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="js/jquery-3.3.1.slim.min.js"></script>
				<script src="js/popper.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/jquery-3.3.1.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


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