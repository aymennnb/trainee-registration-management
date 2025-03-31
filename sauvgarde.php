<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>crud dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
	<!--picture title-->
	<link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Stagiaires Acceptés</title>
	<!-- Favicon -->
	<link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<!-- Google Material Icons -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
				<li class="dropdown active">
					<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">apps</i><span>Les baces</span>
					</a>
					<ul class="collapse list-unstyled menu" id="pageSubmenu2">
						<li>
							<a href="accepter.php"><i class="material-icons">done</i>Stagiaires acceptés</a>
						</li>
						<li class="active">
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
				<!-- Uncomment this if you need the calendar option -->
				<!-- <li>
                <a href="#"><i class="material-icons">library_books</i>Calendrier</a>
            </li> -->
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
							<span class="material-icons text-white">signal_cellular_alt</span> <!--signal_cellular_alt-->
						</div>
					</div>

					<div class="col-md-5 col-lg-3 order-3 order-md-2">

					</div>


					<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
						<div class="xp-profilebar text-right">
							<nav class="navbar p-0">
								<ul class="nav navbar-nav flex-row ml-auto">
									<!-- <li class="dropdown nav-item active">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<span class="material-icons">notifications</span>
												<span class="notification">4</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
												<li><a href="#">You Have 4 New Messages</a></li>
											</ul>
										</li> -->

									<!-- <li class="nav-item">
										<a class="nav-link" href="#">
											<span class="material-icons">question_answer</span>
										</a>
									</li> -->

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
										<!-- <li class="dropdown nav-item">
											<label for="profilePic" class="nav-link" style="cursor: pointer;">
												<img id="profileImg" src="img/user.jpg" style="width:40px; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</label>
											<input type="file" id="profilePic" style="display: none;" accept="image/*">
										</li> -->
										<!-- <ul class="dropdown-menu small-menu">
											<li><a href="#">
													<span class="material-icons">person_outline</span>
													Profile
												</a></li>
											<li><a href="#">
													<span class="material-icons">settings</span>
													Settings
												</a></li>
											<li><a href="login.php">
													<span class="material-icons">logout</span>
													Logout
												</a></li>

										</ul> -->
									</li>


								</ul>
							</nav>
						</div>
					</div>

				</div>
				<div class="xp-breadcrumbbar text-center">
					<h4 class="page-title">Gestion des sauvegardes des stagiaires</h4>
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
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							<h2 class="ml-lg-2">Gérer les stagiaires Supprimer</h2>
						</div>
					</div>
				</div>
				<?php
				include_once("connexion.php");

				$query_count = "SELECT COUNT(*) AS total FROM sauvegarde_stagiaires";
				$count_statement = $connexion->query($query_count);
				$total_rows = $count_statement->fetch()['total'];

				// Nombre de lignes à afficher par page
				$rows_per_page = 7;

				// Calculer le nombre total de pages
				$total_pages = ceil($total_rows / $rows_per_page);

				// Récupérer le numéro de page actuel
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

				// Calculer l'index de début pour la requête SQL en fonction du numéro de page actuel
				$start_index = ($current_page - 1) * $rows_per_page;

				if (isset($_POST['delete'])) {
					$query = "DELETE FROM sauvegarde_stagiaires WHERE cin = :cin";
					$pdostmt = $connexion->prepare($query);
					$pdostmt->execute(['cin' => $_POST['delete']]);
				}

				// Vérification si la requête POST 'recuperer' est reçue
				if (isset($_POST['recuperer'])) {
					// Récupération du cin du stagiaire
					$cin = $_POST['recuperer'];

					// Récupération des détails du stagiaire
					$query_select = "SELECT * FROM sauvegarde_stagiaires WHERE cin = :cin";
					$stmt_select = $connexion->prepare($query_select);
					$stmt_select->execute(['cin' => $cin]);
					$sauvegarde = $stmt_select->fetch(PDO::FETCH_ASSOC);

					// Insertion dans la table "stagiaires"
					if ($sauvegarde) {
						$query_insert = "INSERT INTO stagiaires (cin, nom, prenom, genre, tel, adresse, ddn) VALUES (:cin, :nom, :prenom, :genre, :tel, :adresse, :ddn)";
						$stmt_insert = $connexion->prepare($query_insert);
						$stmt_insert->execute([
							'cin' => $sauvegarde['cin'],
							'nom' => $sauvegarde['nom'],
							'prenom' => $sauvegarde['prenom'],
							'genre' => $sauvegarde['genre'],
							'tel' => $sauvegarde['tel'],
							'adresse' => $sauvegarde['adresse'],
							'ddn' => $sauvegarde['ddn']
						]);
					}

					// Suppression du stagiaire de la table "sauvegarde_stagiaires"
					$query_delete = "DELETE FROM sauvegarde_stagiaires WHERE cin = :cin";
					$stmt_delete = $connexion->prepare($query_delete);
					$stmt_delete->execute(['cin' => $cin]);
				}

				// Faire la requête SQL avec la pagination
				$query = "SELECT * FROM sauvegarde_stagiaires LIMIT $start_index, $rows_per_page";
				$pdostmt = $connexion->query($query);
				$sauvegardes = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
				?>
				<table class="table">
					<thead class="thead">
						<style>
							.thead {
								background-color: #353b48;
								color: white;
							}
						</style>
						<tr>
							<th>CIN</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Genre</th>
							<th>Tél</th>
							<th>Adresse</th>
							<th>Date de naissance</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($sauvegardes as $sauvegarde) : ?>
							<tr>
								<td><?php echo htmlspecialchars($sauvegarde['cin']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['nom']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['prenom']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['genre']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['tel']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['adresse']); ?></td>
								<td><?php echo htmlspecialchars($sauvegarde['ddn']); ?></td>
								<td>
									<style>
										#form1,
										#form2 {
											display: flex;
										}

										.shared-button {
											padding: 0.3rem 0.4rem;
											margin: 0.1rem;
											font-size: 0.675rem;
											display: flex;
											justify-content: center;
											align-items: center;
										}

										#desbutton {
											display: flex;
										}
									</style>
									<div id="desbutton">
										<form id="form1" method="post">
											<input type="hidden" name="delete" value="<?php echo htmlspecialchars($sauvegarde['cin']); ?>">
											<button type="submit" name="delete" value="<?php echo htmlspecialchars($sauvegarde['cin']); ?>" class="btn btn-danger btn-sm shared-button" onclick="return confirmDeletion();">
												<span class="material-icons">&#xE872;</span>
											</button>
										</form>
										<form id="form2" method="post">
											<!-- Bouton pour Valider un stagiaire -->
											<button type="submit" name="recuperer" value="<?php echo htmlspecialchars($sauvegarde['cin']); ?>" onclick="return confirmRecuperation()"  class="btn btn-success shared-button">
												<i class='bx bxs-left-arrow'></i>
											</button>
										</form>
									</div>
									<!-- script de la confirmation -->
									<script>
										function confirmDeletion() {
											return confirm("Êtes-vous sûr de vouloir supprimer ce stagiaire ?");
										}

										function confirmRecuperation() {
											return confirm("Êtes-vous sûr de vouloir récupérer ce stagiaire ?");
										}
									</script>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Affichage de <b><?php echo min($total_rows, $start_index + $rows_per_page); ?></b> sur <b><?php echo $total_rows; ?></b></div>
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



	<!-------complete html----------->






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