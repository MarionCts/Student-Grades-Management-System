<?php 

// Database
include "../includes/Database.php"; 

// Classes
require_once "../classes/Personne.php";
require_once "../classes/Etudiant.php";
require_once "../classes/Matiere.php";
require_once "../classes/MatiereSur10.php";
require_once "../classes/MatiereSur20.php";
require_once "../classes/Note.php";

$sql = "SELECT * FROM etudiants";

?>

<?php

$etudiant1 = new Etudiant(1, "Durand", "Elise", 056);
$note1 = new MatiereSur10(5);

echo $etudiant1->getNom();
echo $note1->getMatiereSur10();

?>