<?php

// Header
require_once "../includes/header.php";

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
$notes = GestionNotes::listerNotes($pdo);
$moyenne = new GestionNotes();

?>

<h4 class="secondary-title">Liste des étudiants</h4>
<table class="table-template">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matricule</th>
            <th>Date de naissance</th>
            <th>Moyenne générale</th>
    <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td class="bolder uppercase"><?= htmlspecialchars($etudiant->getNom()) ?></td>
                <td class="bolder"><?= htmlspecialchars($etudiant->getPrenom()) ?></td>
                <td><?= htmlspecialchars($etudiant->getMatricule()) ?></td>
                <td><?= htmlspecialchars($etudiant->getDateNaissance()) ?></td>
                <td class="bolder"><?= htmlspecialchars($moyenne->calculateAverageGrade($pdo, $etudiant)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </tr>
    </thead>
</table>

<h4 class="secondary-title">Liste des professeurs</h4>
<table class="table-template">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matière enseignée</th>
    <tbody>
        <?php foreach ($professeurs as $professeur): ?>
            <tr>
                <td class="bolder uppercase"><?= htmlspecialchars($professeur->getNom()) ?></td>
                <td class="bolder"><?= htmlspecialchars($professeur->getPrenom()) ?></td>
                <td><?= htmlspecialchars($professeur->getIdMatiere()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </tr>
    </thead>
</table>

<h4 class="secondary-title">Liste des matières</h4>
<table class="table-template">
    <thead>
        <tr>
            <th>Matière</th>
    <tbody>
        <?php foreach ($matieres as $matiere): ?>
            <tr>
                <td><?= htmlspecialchars($matiere->getNomMatiere()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </tr>
    </thead>
</table>

<h4 class="secondary-title">Liste des notes</h4>
<table class="table-template">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Note</th>
            <th>Matière</th>
    <tbody>
        <?php foreach ($notes as $note): ?>
            <tr>
            <td class="bolder uppercase"><?= htmlspecialchars($note->getNom()) ?></td>    
            <td class="bolder"><?= htmlspecialchars($note->getPrenom()) ?></td>
                <td><?= htmlspecialchars($note->getValeurNote()) ?></td>
                <td><?= htmlspecialchars($note->getIdMatiere()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </tr>
    </thead>
</table>

<?php

// Footer
require_once "../includes/footer.php";

?>