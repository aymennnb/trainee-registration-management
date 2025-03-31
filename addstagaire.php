<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Stagiaire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="website icon" type="png/jpg" href="img/Logo_ofppt.png">
</head>

<body>
    <div class="container mt-5">
        <style>
            body{
                background-image: url('img//ofppt-1.jpg');
                background-size: cover;
            }
        </style>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                    <style>
                            .img-fluid{
                                border-radius: 50%;
                            }
                        </style>
                        <h3 class="text-center">Inscription Stagiaire</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="cin">CIN</label>
                                <input type="text" class="form-control" name="cin" placeholder="Enter CIN" required>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="Enter Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" placeholder="Enter Prénom" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <select class="form-control" name="genre" required>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tel">Téléphone</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Enter Téléphone" required>
                            </div>
                            <div class="form-group">
                                <label for="mdeb">La note du baccalauréat</label>
                                <input type="text" class="form-control" name="mdeb" id="mdeb" placeholder="Enter la Moyenne de Bac" required>
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Enter Adresse" required>
                            </div>
                            <div class="form-group">
                                <label for="ddn">Date de naissance</label>
                                <input type="date" class="form-control" name="ddn" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
</body>

</html>

<?php
include_once("connexion.php");
// var_dump("connexion.php");

if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["genre"]) && !empty($_POST["tel"]) && !empty($_POST["mdeb"]) && !empty($_POST["adresse"]) && !empty($_POST["ddn"])) {
    $query = 'insert into stagiaires (cin,nom,prenom,genre,tel,mdeb,adresse ,ddn) values (:cin, :nom, :prenom, :genre, :tel,:mdeb, :adresse ,:ddn)';
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute([
        "cin" => $_POST["cin"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "genre" => $_POST["genre"],
        "tel" => $_POST["tel"],
        "mdeb" => $_POST["mdeb"],
        "adresse" => $_POST["adresse"],
        "ddn" => $_POST['ddn']
    ]);
    $pdostmt->closeCursor();
    header("location:addfiles.php");
}
?>