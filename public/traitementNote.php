<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Note.php";
require_once "../classes/GestionNotes.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addNote']) && $_POST['addNote'] >= 0 && $_POST['addNote'] <= 20) {
    $pdo = Database::getConnection();
    $note = new Note(null, $_POST['id_etudiant'], $_POST['id_matiere'], $_POST['valeurNote']);
    $ajoutNote = new GestionNotes();
    $ajoutNote->addNote($pdo, $note);

    header("location: index.php");
    exit();
} else {
    $error = "Une information est erronnée.";
    header("location: attribuerNote.php");
    exit();
}
