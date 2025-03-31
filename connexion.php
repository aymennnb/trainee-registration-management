<?php
$host = 'localhost';
$dbname = 'prj';
$username = 'root';
$password = '131809129';
try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo 'connexion etablie avec succes';
} catch (PDOException $e) {
    die("Impossible de se connecter à la base de donnée $dbname :" . $e->getMessage());
}