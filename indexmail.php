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
                            <a href="accepter.php"><i class="material-icons">done</i>Pendant la vérification</a>
                        </li>
                        <li>
                            <a href="#"><i class="material-icons">edit</i>Stagiaires acceptés</a>
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
                <li class="active">
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
                                    <h2 class="ml-lg-2">Send Message to Stagiaires</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Formulaire de contact ajouté ici -->
                        <div class="container mt-4">
                            <form id="contact" action="mail.php" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="ISGI institut" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email Address" tabindex="2">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Type your subject line" tabindex="3">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" name="message" id="message" placeholder="Type your Message Details Here..." rows="5" tabindex="4"></textarea>
                                </div>
                                <button type="submit" name="send" id="contact-submit" class="btn btn-primary" style="width:100%;">send Now</button>
                            </form>
                        </div>
                        <!-- Fin du formulaire de contact -->
                    </div>
                </div>
            </div>
        </div>

        <?php
        // include_once("connexion.php");

        // // Fonction pour récupérer l'e-mail de l'administrateur par son cin
        // function getEmailByCin($cin) {
        // 	global $connexion; // Rendre la connexion à la base de données disponible dans cette fonction

        // 	$query = "SELECT email FROM admins WHERE cin = :cin";
        // 	$pdostmt = $connexion->prepare($query);
        // 	$pdostmt->execute(['cin' => $cin]);
        // 	$result = $pdostmt->fetch(PDO::FETCH_ASSOC);

        // 	return $result['email']; // Retourner l'e-mail récupéré
        // }

        // // Fonction pour envoyer l'e-mail de confirmation
        // function sendConfirmationEmail($email) {
        // 	// Code pour envoyer un e-mail à l'adresse spécifiée
        // 	// Vous pouvez utiliser la fonction mail() de PHP ou une bibliothèque comme PHPMailer pour envoyer l'e-mail
        // 	// Assurez-vous que votre serveur est configuré pour envoyer des e-mails

        // 	// Exemple avec la fonction mail() de PHP (configurez votre serveur pour permettre l'envoi d'e-mails)
        // 	$subject = "Confirmation d'acceptation";
        // 	$message = "Votre compte a été accepté. Merci!";
        // 	$headers = "From: votre_email@example.com"; // Remplacez par votre adresse e-mail
        // 	mail($email, $subject, $message, $headers);
        // }

        // // Vérifier si le formulaire a été soumis et si le bouton "accepter" a été cliqué
        // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accepter'])) {
        // 	// Récupérer le CIN du stagiaire à partir du formulaire
        // 	$cin = $_POST['accepter'];

        // 	// Récupérer l'e-mail de l'administrateur associé à ce CIN
        // 	$email = getEmailByCin($cin);

        // 	if ($email) {
        // 		// Envoyer l'e-mail de confirmation
        // 		sendConfirmationEmail($email);
        // 		echo "E-mail de confirmation envoyé à ".$email;
        // 	} else {
        // 		echo "L'adresse e-mail de l'administrateur n'a pas été trouvée.";
        // 	}
        // }
        ?>


        <!----footer-design------------->





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