<?php

// Header
require_once "../includes/header.php";

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/GestionNotes.php";

?>

<main>
    <h1 class="primary-title">Ajouter un étudiant</h1>
    <form action="traitementEtudiant.php" method="post">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="matricule">Matricule</label>
            <input type="text" name="matricule" id="matricule">
        </div>
        <div>
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance">
        </div>
        <input class="primary-button" type="submit" name="addStudent" value="Ajouter">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($SESSION['csrf_token']) ?>">
    </form>
</main>

<?php

// Footer
require_once "../includes/footer.php";

?>