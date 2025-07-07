<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Etudiant.php";
require_once "../classes/Personne.php";
require_once "../classes/GestionNotes.php";

session_start();

// Generating the CSRF Token to secure the information posted with the form
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStudent']) && isset($_POST['csrf_token'])) {
    $pdo = Database::getConnection();
    $etudiant = new Etudiant(null, $_POST['nom'], $_POST['prenom'], $_POST['matricule'], $_POST['date_naissance']);
    $ajoutEtudiant = new GestionNotes();
    $ajoutEtudiant->addStudent($pdo, $etudiant);

    header("location: index.php");
    exit();

} else {
    $error = "Le formulaire ne peut pas être validé.";
}
