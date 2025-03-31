<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
    <!-- Preload the image -->
    <link rel="preload" href="img/line.jpg" as="image">
    <style>
        body {
            background-image: url('img/line.jpg');
            background-size: cover;
        }

        .accept-police {
            margin-top: 15px;
            margin-left: 3px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <style>
                            .img-fluid{
                                border-radius: 50%;
                            }
                        </style>
                        <h3 class="text-center">Log in</h3>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" style="width: 100%;" class="btn btn-primary" id="submitButton" disabled>log in</button>
                            <div class="accept-police">Vous acceptez nos<span><a href="#">&ensp;Conditions d'utilisation</a></span>&ensp;et notre<span><a href="#">&ensp;Déclaration de confidentialité</a></span></div>
                            <div class="accept-police">Je souhaite créer un compte&ensp;<span><a href="register.php">créer un compte</a></span></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("connexion.php");

    if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $query = "select * from admins WHERE email='$email' AND mdp='$mdp'";
        $result = $connexion->query($query);
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $role = $row['Roles']; 
            if ($role == 'admin') {
                header("Location:index.php");
                exit;
            } 
            elseif ($role == 'stagaire') {
                header("Location:index2.php");
                exit;
            }
        } 
        else {
            echo '<script>window.alert("account not found .");</script>';
            echo '<script>window.alert("can you create an account");</script>';
        }
    }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fonction pour vérifier si tous les champs sont remplis et la case à cocher est cochée
        function checkFields() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("mdp").value;
            var checkbox = document.getElementById("exampleCheck1");

            if (email !== "" && password !== "" && checkbox.checked) {
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
            }
        }

        document.getElementById("email").addEventListener("input", checkFields);
        document.getElementById("mdp").addEventListener("input", checkFields);
        document.getElementById("exampleCheck1").addEventListener("change", checkFields);

        checkFields();
    </script>
</body>

</html>
