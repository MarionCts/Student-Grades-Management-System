<?php 

// Header
require_once "../includes/header.php";

// Database
require_once "../includes/Database.php"; 

// Classes
require_once "../classes/GestionNotes.php"; 

?>

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
    <input type="submit" name="addSubject" value="Ajouter">
    <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($SESSION['csrf_token'])?>">
</form>

<?php

// Footer
require_once "../includes/footer.php";

?>