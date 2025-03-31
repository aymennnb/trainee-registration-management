<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>crud dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!--picture title-->
    <link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
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
						<li class="active">
							<a href="accepter.php"><i class="material-icons">done</i>Stagiaires acceptés</a>
						</li>
						<li>
							<a href="sauvgarde.php"><i class="material-icons">bookmark</i>Sauvegarde</a>
						</li>
					</ul>
				</li>
				<li >
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
							<span class="material-icons text-white">signal_cellular_alt</span> <!--signal_cellular_alt-->
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
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							<h2 class="ml-lg-2">Gérer les stagiaires acceptés</h2>
						</div>
						<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							<button class="btn btn-warning" onclick="generatePDF()"><span><i class='bx bxs-file-pdf'></i>&ensp;Imprimer la liste des stagiaires acceptés</span></button>						</div>
						</div>
				</div>
				<?php
				include_once("connexion.php");

				$query_count = "select COUNT(*) AS total FROM accepter";
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
					$query = "delete FROM accepter WHERE cin = :cin";
					$pdostmt = $connexion->prepare($query);
					$pdostmt->execute(['cin' => $_POST['delete']]);
				}

				// Faire la requête SQL avec la pagination
				$query = "select * FROM accepter LIMIT $start_index, $rows_per_page";
				$pdostmt = $connexion->query($query);
				$stagiaires = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
				?>
				<table class="table" id="dataTable">
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
							<th>Date d'acceptation</th>
							<th>Action</th>
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
								<td><?php echo htmlspecialchars($stagiaire['adresse']); ?></td>
								<td><?php echo htmlspecialchars($stagiaire['ddn']); ?></td>
								<td><?php echo htmlspecialchars($stagiaire['date_acceptation']); ?></td>
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
											<input type="hidden" name="delete" value="<?php echo htmlspecialchars($stagiaire['cin']); ?>">
											<button type="submit" name="delete" value="<?php echo htmlspecialchars($stagiaire['cin']); ?>" class="btn btn-danger btn-sm" onclick="return confirmDeletion();">
												<span class="material-icons">&#xE872;</span>
											</button>
										</form>
									<!--script de la confirmation-->
									<script>
										function confirmDeletion() {
											return confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
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

	<script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
<script>
function generatePDF(){
    var pdfObject = jsPDFInvoiceTemplate.default(props);
    console.log("Object Created: ", pdfObject);
}

var props = {
    outputType: jsPDFInvoiceTemplate.OutputType.Save,
    returnJsPDFDocObject: true,
    fileName: "Liste des stagiaires acceptés",
    orientationLandscape: false,
    compress: true,
    logo: {
        src: "img/Logo_ofppt22.png",
        type: 'PNG', 
        width: 26.33, 
        height: 26.66,
        margin: {
            top: 0, 
            left: 0 
        }
    },
    business: {
        name: "ISGI OFPPT",
        address: "Maroc, 21, Casablanca 20250",
        phone: "0522243175",
        email: "isgi@ofppt.ma",
        website: "www.ofpptisgi.ma",
    },
	contact: {
    	label: "",
    	name: "Liste des stagiaires acceptés",
    	labelStyle: { marginTop: 10, marginBottom: 10, textAlign: 'center' }
	},
    invoice: {
        label: "",
        invDate: "",
        invGenDate: "",
        headerBorder: false,
        tableBodyBorder: false,
		header: [
			{ title: "#", style: { width: 8, fontSize: 5 } },
			{ title: "CIN", style: { width: 27, fontSize: 3 } },
			{ title: "Nom", style: { width: 20, fontSize: 5 } },
			{ title: "Prénom", style: { width: 14, fontSize: 5 } },
			{ title: "Genre", style: { width: 15, fontSize: 4 } },
			{ title: "Tél", style: { width: 30, fontSize: 5 } },
			{ title: "Adresse", style: { width: 25, fontSize: 5 } },
			{ title: "Date d.n", style: { width: 20, fontSize: 4 } },
			{ title: "Date d'acceptation", style: { width: 30, fontSize: 3 } }
		],
		labelStyle: { textAlign: 'center', fontSize: 10 },
        table: Array.from(<?php echo json_encode($stagiaires); ?>, (stagiaire, index) => ([
            index + 1,
            stagiaire['cin'],
            stagiaire['nom'],
            stagiaire['prenom'],
            stagiaire['genre'],
            stagiaire['tel'],
            stagiaire['adresse'],
            stagiaire['ddn'],
            stagiaire['date_acceptation']
        ])),
        additionalRows: [],
        invDescLabel: "",
        invDesc: ""
    },
    footer: {
        text: "La facture est générée sur ordinateur et est valable sans signature ni cachet.",
    },
    pageEnable: true,
    pageLabel: "Page ",
};

</script>
</script>

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