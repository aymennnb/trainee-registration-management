<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enregistrement</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="img/Logo_ofppt.png">
  <style>
    .hidden {
      display: none;
    }
    span.required {
      color: red;
      font-size: 20px;
    }
    select option {
      font-size: 15px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Enregistrement</h3>
        </div>
        <div class="card-body">
          <form id="registerForm" method="post">
            <div class="form-group">
              <label for="cin">CIN <span class="required">*</span>:</label>
              <input type="text" class="form-control" id="cin" name="cin" placeholder="Entrez le numéro de CIN" required>
            </div>
            <div class="form-group">
              <label for="email">Email <span class="required">*</span>:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" required>
            </div>
            <div class="form-group">
              <label for="mdp">Mot de passe <span class="required">*</span>:</label>
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
              <label for="confirm_mdp">Confirmer le mot de passe <span class="required">*</span>:</label>
              <input type="password" class="form-control" id="confirm_mdp" name="confirm_mdp" placeholder="Confirmez votre mot de passe" required>
            </div>
            <div class="form-group">
              <label for="roles">Rôle :</label>
              <select class="form-control" id="roles" name="Roles" required>
                <option value="stagiaire">Stagiaire</option>
                <option value="admin">Administrateur</option>
              </select>
            </div>
            <div class="form-group hidden" id="adminCodeField">
              <label for="code_admin">Code d'administrateur :</label>
              <input type="password" class="form-control" id="code_admin" name="code_admin" placeholder="Entrez le code d'administrateur">
            </div>
            <button type="submit" style="width: 100%;" class="btn btn-primary" id="submitButton" disabled>Enregistrer</button>
          </form>
        </div>
      </div>
    </div>
  </div><br><br><br>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  document.getElementById('roles').addEventListener('change', function() {
    var adminCodeField = document.getElementById('adminCodeField');
    if (this.value === 'admin') {
      adminCodeField.classList.remove('hidden');
      document.getElementById('code_admin').setAttribute('required', true);
    } else {
      adminCodeField.classList.add('hidden');
      document.getElementById('code_admin').removeAttribute('required');
    }
  });

  document.getElementById('registerForm').addEventListener('input', function() {
    var requiredFields = document.querySelectorAll('[required]');
    var allFieldsFilled = true;
    requiredFields.forEach(function(field) {
      if (!field.value.trim()) {
        allFieldsFilled = false;
      }
    });
    document.getElementById('submitButton').disabled = !allFieldsFilled;
  });
</script>
</body>
</html>


<?php
include_once("connexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $cin = $_POST['cin'];
  $email = $_POST['email'];
  $mdp = $_POST['mdp'];
  $confirm_mdp = $_POST['confirm_mdp'];
  $role = $_POST['Roles'];
  $code_admin = isset($_POST['code_admin']) ? $_POST['code_admin'] : '';

  if ($mdp !== $confirm_mdp) {
    echo "<script>window.alert('Les mots de passe ne correspondent pas');</script>";
  } else {
    if ($role === 'admin' && $code_admin !== '0000') {
      echo "<script>window.alert('Le code administrateur n\'est pas correct');</script>";
    } else {
      $query = 'INSERT INTO admins (cin, email, mdp, Roles) VALUES (:cin, :email, :mdp, :Roles)';
      $pdostmt = $connexion->prepare($query);
      $pdostmt->execute([
        'cin' => $cin,
        'email' => $email,
        'mdp' => $mdp,
        'Roles' => $role
      ]);
      $pdostmt->closeCursor();
      header('Location: login.php');
      exit();
    }
  }
}
?>

