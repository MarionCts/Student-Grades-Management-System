<?php

// Header
require_once "../includes/header.php";

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/GestionNotes.php";

?>

<main>
    <h1 class="primary-title">Ajouter une matière</h1>
    <form action="traitementMatiere.php" method="post">
        <div>
            <label for="nomMatiere">Nom de la matière</label>
            <input type="text" name="nomMatiere" id="nomMatiere">
        </div>
        <div>
            <label for="codeMatiere">Code de la matière</label>
            <input type="text" name="codeMatiere" id="codeMatiere">
        </div>
        <div>
            <input class="primary-button" type="submit" name="addSubject" value="Ajouter">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($SESSION['csrf_token']) ?>">
    </form>
</main>

<?php

// Footer
require_once "../includes/footer.php";

?>