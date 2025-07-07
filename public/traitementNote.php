<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Note.php";
require_once "../classes/GestionNotes.php";

// Generating the CSRF Token to secure the information posted with the form
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addNote']) && isset($_POST['csrf_token']) && $_POST['valeurNote'] >= 0 && $_POST['valeurNote'] <= 20) {
    $pdo = Database::getConnection();
    $note = new Note(null, null, null, $_POST['id_etudiant'], $_POST['id_matiere'], $_POST['valeurNote']);
    $ajoutNote = new GestionNotes();
    $ajoutNote->addNote($pdo, $note);

    header("location: index.php");
    exit();
} else {
    $error = "Une information est erronnée.";
    header("location: attribuerNote.php");
    exit();
}
