<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Personne.php";
require_once "../classes/Etudiant.php";
require_once "../classes/Professeur.php";
require_once "../classes/GestionNotes.php";
require_once "../classes/Matiere.php";
require_once "../classes/MatiereSur10.php";
require_once "../classes/MatiereSur20.php";
require_once "../classes/Note.php";

$pdo = Database::getConnection();
$etudiants = GestionNotes::listerEtudiants($pdo);
$professeurs = GestionNotes::listerProfesseurs($pdo);
$matieres = GestionNotes::listerMatieres($pdo);

?>

<h4>Liste des étudiants</h4>
<?php foreach ($etudiants as $etudiant): ?>
    <p><?= htmlspecialchars($etudiant->getNom()) ?></p>
    <p><?= htmlspecialchars($etudiant->getPrenom()) ?></p>
    <p><?= htmlspecialchars($etudiant->getDateNaissance()) ?></p>
    <p><?= htmlspecialchars($etudiant->getMatricule()) ?></p>
<?php endforeach; ?>

<h4>Liste des professeurs</h4>
<?php foreach ($professeurs as $professeur): ?>
<p><?= htmlspecialchars($professeur->getNom()) ?></p>
<p><?= htmlspecialchars($professeur->getPrenom()) ?></p>
<p><?= htmlspecialchars($professeur->getCodeMatiere()) ?></p>
<?php endforeach; ?>

<h4>Liste des matières</h4>
<?php foreach ($matieres as $matiere): ?>
<p><?= htmlspecialchars($matiere->getNomMatiere()) ?></p>
<p><?= htmlspecialchars($matiere->getCodeMatiere()) ?></p>
<?php endforeach; ?>

<a href="ajoutEtudiant.php">Ajouter un étudiant</a>
<a href="ajoutMatiere.php">Ajouter une matière</a>