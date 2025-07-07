<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Matiere.php";
require_once "../classes/GestionNotes.php";

// Generating the CSRF Token to secure the information posted with the form
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addSubject']) && isset($_POST['csrf_token'])) {
    $pdo = Database::getConnection();
    $matiere = new Matiere(null, $_POST['nomMatiere'], $_POST['codeMatiere']);
    $ajoutMatiere = new GestionNotes();
    $ajoutMatiere->addSubject($pdo, $matiere);

    header("location: index.php");
    exit();
}
