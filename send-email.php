<?php
require 'vendor/autoload.php'; // Inclut automatiquement les classes installées via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Récupération de l'email de l'utilisateur depuis la base de données (exemple)
    // Assurez-vous d'avoir configuré votre connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "your_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT email FROM admins WHERE cin = :cin");
        $stmt->bindParam(':cin', $cin);
        $cin = $_POST['cin']; // Suppose que le cin est envoyé via le formulaire
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $recipient_email = $result['email'];

        // Configuration de PHPMailer
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'your-email-password'; // Remplacez par votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom($email, $name);
        $mail->addAddress($recipient_email); // Adresse e-mail du destinataire récupérée de la base de données

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Le message a été envoyé';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}
?>
