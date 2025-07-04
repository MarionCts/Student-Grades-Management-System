<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Etudiant.php";
require_once "../classes/Personne.php";
require_once "../classes/GestionNotes.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStudent'])) {
    $pdo = Database::getConnection();
    $etudiant = new Etudiant(null, $_POST['nom'], $_POST['prenom'], $_POST['matricule'], $_POST['date_naissance']);
    $ajoutEtudiant = new GestionNotes();
    $ajoutEtudiant->addStudent($pdo, $etudiant);

    header("location: index.php");
    exit();
}
