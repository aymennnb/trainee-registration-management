<?php
include_once("connexion.php");

$query = "select * from stagiaires where cin=:id";
$pdostmt = $connexion->prepare($query);
$pdostmt->execute(["id" => $_GET["id"]]);
$ligne = $pdostmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Stagiaire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Modifier les informations du stagiaire</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="cin">CIN</label>
                            <input type="text" class="form-control" name="cin" value="<?php echo $ligne["cin"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $ligne["nom"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $ligne["prenom"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select class="form-control" name="genre" required>
                                <option value="homme" <?php if ($ligne["genre"] === "homme") echo "selected"; ?>>Homme</option>
                                <option value="femme" <?php if ($ligne["genre"] === "femme") echo "selected"; ?>>Femme</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $ligne["tel"] ?>" required>
                        </div>
                        <div class="form-group">
                                <label for="mdeb">La note du baccalauréat</label>
                                <input type="text" class="form-control" name="mdeb" id="mdeb" value="<?php echo $ligne["mdeb"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $ligne["adresse"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ddn">Date de naissance</label>
                            <input type="date" class="form-control" name="ddn" value="<?php echo $ligne["ddn"] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php
if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["genre"]) && !empty($_POST["tel"]) && !empty($_POST["adresse"]) && !empty($_POST["ddn"])) {
    $query = "update stagiaires set cin=:cin, nom=:nom, prenom=:prenom, genre=:genre, tel=:tel,mdeb=:mdeb, adresse=:adresse, ddn=:ddn where cin=:id";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute([
        "cin" => $_POST["cin"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "genre" => $_POST["genre"],
        "tel" => $_POST["tel"],
        "mdeb" => $_POST["mdeb"],
        "adresse" => $_POST["adresse"],
        "ddn" => $_POST["ddn"],
        "id" => $_GET["id"]
    ]);
    $pdostmt->closeCursor();
    header("Location:index.php");
}
?>
