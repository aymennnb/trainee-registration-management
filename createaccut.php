<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<style>
    body {
        background-image: url("img/line.jpg");
        background-size: cover;
    }
</style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <style>
                            .img-fluid {
                                border-radius: 50%;
                            }
                        </style>
                        <h3 class="text-center">Créer un compte</h3>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="post" onsubmit="return validateForm()">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Mot de passe" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="confirm_password">Confirmer le mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmer le Mot de passe" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Roles">Rôle</label>
                                    <select class="form-control" name="Roles" id="Roles" required>
                                        <option value="stagiaire">Stagiaire</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div id="code-de-confirmation" class="form-group col-md-12" style="display: none;">
                                    <label for="confirmation_code">Code d'admin</label>
                                    <input type="text" class="form-control" name="confirmation_code" id="confirmation_code" placeholder="Enter Confirmation Code">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;" id="submitButton">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            var passwordInput = document.getElementById('password');
            var passwordIcon = document.getElementById('togglePassword').querySelector('i');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        });

        // Function to toggle confirmation password visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            var confirmPasswordInput = document.getElementById('confirm_password');
            var confirmPasswordIcon = document.getElementById('toggleConfirmPassword').querySelector('i');

            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                confirmPasswordIcon.classList.remove('fa-eye');
                confirmPasswordIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = "password";
                confirmPasswordIcon.classList.remove('fa-eye-slash');
                confirmPasswordIcon.classList.add('fa-eye');
            }
        });

        // Function to show/hide confirmation code field based on role selection
        document.getElementById('Roles').addEventListener('change', function () {
            var role = this.value;
            var confirmationCodeField = document.getElementById('code-de-confirmation');
            if (role === "stagiaire") {
                confirmationCodeField.style.display = "none";
            } else {
                confirmationCodeField.style.display = "block";
            }
        });

        // Function to validate form fields
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var role = document.getElementById("Roles").value;
            var confirmationCode = document.getElementById("confirmation_code").value;

            if (password !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            if (role === "admin" && confirmationCode === "") {
                alert("Veuillez entrer le code d'admin.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
<?php
include_once("connexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'], $_POST['password'], $_POST['Roles'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['Roles'];

        if ($role == 'admin') {
            if (isset($_POST['confirmation_code']) && $_POST['confirmation_code'] == "1BBe04fxe2223") {
                $query = 'INSERT INTO admins (email, mdp, Roles) VALUES (:email, :mdp, :Roles)';
                $pdostmt = $connexion->prepare($query);
                if ($pdostmt->execute([
                    "email" => $email,
                    "mdp" => $password,
                    "Roles" => $role
                ])) {
                    echo "<script>alert('Enregistrement avec succès.');</script>";
                    // header("Location: index.php");
                    // exit;
                } else {
                    echo "<script>alert('Erreur lors de l\'enregistrement.');</script>";
                }
                $pdostmt->closeCursor();
            } else {
                echo "<script>alert('Code d\'admin incorrect.');</script>";
            }
        } elseif ($role == 'stagiaire') {
            $query = 'INSERT INTO admins (email, mdp, Roles) VALUES (:email, :mdp, :Roles)';
            $pdostmt = $connexion->prepare($query);
            if ($pdostmt->execute([
                "email" => $email,
                "mdp" => $password,
                "Roles" => $role
            ])) {
                echo "<script>alert('Enregistrement avec succès.');</script>";
                // header("Location: index2.php");
                // exit;
            } else {
                echo "<script>alert('Erreur lors de l\'enregistrement.');</script>";
            }
            $pdostmt->closeCursor();
        }
    } else {
        echo "<script>alert('Veuillez remplir tous les champs.');</script>";
    }
}
?>
