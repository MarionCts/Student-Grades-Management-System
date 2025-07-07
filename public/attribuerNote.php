<?php 

// Header
require_once "../includes/header.php";

// Database
require_once "../includes/Database.php"; 

// Classes
require_once "../classes/GestionNotes.php"; 

$pdo = Database::getConnection();
$etudiants = GestionNotes::listerEtudiants($pdo);
$matieres = GestionNotes::listerMatieres($pdo);

?>

<form action="traitementNote.php" method="post">
    <div>
        <label for="selectStudent">Étudiant</label>
        <select name="id_etudiant" id="id_etudiant">
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?= htmlspecialchars($etudiant->getId()) ?>"><?= htmlspecialchars($etudiant->getPrenomEtNom()) ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="selectSubject">Matière</label>
        <select name="id_matiere" id="id_matiere">
            <?php foreach ($matieres as $matiere): ?>
                <option value="<?= htmlspecialchars($matiere->getId()) ?>"><?= htmlspecialchars($matiere->getNomMatiere()) ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="valeurNote">Attribuer une note</label>
        <input type="number" name="valeurNote" id="valeurNote">
    </div>
    <input type="submit" name="addNote" value="Ajouter">
    <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($SESSION['csrf_token'])?>">
</form>

<?php

// Footer
require_once "../includes/footer.php";

?>