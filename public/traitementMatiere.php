<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Matiere.php";
require_once "../classes/GestionNotes.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addSubject'])) {
    $pdo = Database::getConnection();
    $matiere = new Matiere(null, $_POST['nomMatiere'], $_POST['codeMatiere']);
    $ajoutMatiere = new GestionNotes();
    $ajoutMatiere->addSubject($pdo, $matiere);

    header("location: index.php");
    exit();
}
