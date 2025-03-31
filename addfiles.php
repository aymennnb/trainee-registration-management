<?php
include_once("connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider et filtrer l'entrée CIN
    $cin = isset($_POST["cin"]) ? htmlspecialchars($_POST["cin"]) : "";

    // Valider et filtrer les noms de fichiers
    $photo_name = isset($_FILES["photo"]["name"]) ? htmlspecialchars($_FILES["photo"]["name"]) : "";
    $releve_notes_name = isset($_FILES["releve_notes"]["name"]) ? htmlspecialchars($_FILES["releve_notes"]["name"]) : "";
    $baccalaureat_name = isset($_FILES["baccalaureat"]["name"]) ? htmlspecialchars($_FILES["baccalaureat"]["name"]) : "";

    // Déplacer les fichiers téléchargés vers le répertoire de téléchargement
    $upload_dir = "uploads/";
    $photo_tmp_name = isset($_FILES["photo"]["tmp_name"]) ? $_FILES["photo"]["tmp_name"] : "";
    $releve_notes_tmp_name = isset($_FILES["releve_notes"]["tmp_name"]) ? $_FILES["releve_notes"]["tmp_name"] : "";
    $baccalaureat_tmp_name = isset($_FILES["baccalaureat"]["tmp_name"]) ? $_FILES["baccalaureat"]["tmp_name"] : "";
    
    // Vérifier si le répertoire existe, sinon le créer
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Changer les autorisations du répertoire
    chmod($upload_dir, 0777);

    // Déplacer les fichiers téléchargés
    move_uploaded_file($photo_tmp_name, $upload_dir . $photo_name);
    move_uploaded_file($releve_notes_tmp_name, $upload_dir . $releve_notes_name);
    move_uploaded_file($baccalaureat_tmp_name, $upload_dir . $baccalaureat_name);

    // Insérer les données dans la base de données
    $query = "INSERT INTO files (cin, photo, releve_notes, baccalaureat) VALUES (:cin, :photo, :releve_notes, :baccalaureat)";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":cin", $cin);
    $stmt->bindParam(":photo", $photo_name);
    $stmt->bindParam(":releve_notes", $releve_notes_name);
    $stmt->bindParam(":baccalaureat", $baccalaureat_name);
    
    // Exécuter la requête
    if ($stmt->execute()) {
        echo "<script>alert('Enregistrement avec succès.'); window.location.href = 'index2.php';</script>";
        exit;
    } else {
        echo "<script>alert('Une erreur s\'est produite lors de l\'insertion des données.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de stagiaire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Formulaire de stagiaire</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="cin">CIN :</label>
                        <input type="text" class="form-control" name="cin" id="cin" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="photo">Photo :</label>
                        <input type="file" class="form-control-file" name="photo" id="photo" accept="image/*" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="releve_notes">Relevé de notes :</label>
                        <input type="file" class="form-control-file" name="releve_notes" id="releve_notes" accept=".pdf" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="baccalaureat">Baccalauréat :</label>
                        <input type="file" class="form-control-file" name="baccalaureat" id="baccalaureat" accept=".pdf" required>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

