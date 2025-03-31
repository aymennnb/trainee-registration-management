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
                <li>
                    <a href="acc.php"><i class="material-icons">account_circle</i> Accounts</a>
                </li>
                <li class="active">
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
                                    <h2 class="ml-lg-2">Gestion des inscriptions des stagiaires</h2>
                                </div>
                                <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                </div>
                            </div>
                        </div>

                        <?php
                        include_once("connexion.php");

                        if (isset($_POST['delete'])) {
                            $query = "DELETE FROM files WHERE cin = :cin";
                            $pdostmt = $connexion->prepare($query);
                            $pdostmt->execute(['cin' => $_POST['delete']]);
                        }

                        $query = "SELECT * FROM files";
                        $pdostmt = $connexion->query($query);
                        $salaries = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    <th>Photo</th>
                                    <th>Relevé de notes</th>
                                    <th>Baccalauréat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salaries as $salarie) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($salarie['cin']); ?></td>
                                        <td><img src="<?php echo htmlspecialchars($salarie['photo']); ?>" alt="Photo de profil" style="max-width: 100px;"></td>
                                        <td><?php echo htmlspecialchars($salarie['releve_notes']); ?></td>
                                        <td><?php echo htmlspecialchars($salarie['baccalaureat']); ?></td>
                                        <!-- Ajout du bouton de suppression -->
                                        <td>
                                            <form id="form1" method="post">
                                                <input type="hidden" name="delete" value="<?php echo htmlspecialchars($salarie['cin']); ?>">
                                                <button type="submit" class="btn btn-danger"><span class="material-icons">&#xE872;</span></button>
                                                <button type="button" name="accepterstagaire" class="btn btn-primary" onclick="return confirmValidation();">
													<span class="material-icons">done</span>
												</button>
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
                                            </form>
                                            <style>
                                                .btn {
                                                    padding: 0.1rem 0.2rem;
                                                    margin: 0.1rem 0.1rem;
                                                    font-size: 0.675rem;
                                                }
                                            </style>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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