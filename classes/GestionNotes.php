<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Personne.php";
require_once "../classes/Matiere.php";
require_once "../classes/Etudiant.php";
require_once "../classes/Professeur.php";

class GestionNotes
{

    // --------- LISTING STUDENTS / NOTES / TEACHERS / SCHOOL SUBJECTS ---------

    // Getting the list of all students in database

    public static function listerEtudiants($pdo)
    {
        $sql = "SELECT * FROM etudiants";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $etudiants = [];

        foreach ($results as $value) {
            $etudiants[] = new Etudiant(
                $value['id'],
                $value['nom'],
                $value['prenom'],
                $value['matricule'],
                $value['date_naissance']
            );
        }
        return $etudiants;
    }

    // Getting the list of all teachers in database

    public static function listerProfesseurs($pdo)
    {
        $sql = "SELECT * FROM professeurs";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $professeurs = [];

        foreach ($results as $value) {
            $professeurs[] = new Professeur(
                $value['id'],
                $value['nom'],
                $value['prenom'],
                $value['id_matiere']
            );
        }
        return $professeurs;
    }

    // Getting the list of all school subjects in database

    public static function listerMatieres($pdo)
    {
        $sql = "SELECT * FROM matieres";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $matieres = [];

        foreach ($results as $value) {
            $matieres[] = new Matiere(
                $value['id'],
                $value['nomMatiere'],
                $value['codeMatiere']
            );
        }
        return $matieres;
    }

    // --------- ADDING STUDENTS / NOTES / TEACHERS / SCHOOL SUBJECTS ---------

    // Adding a new student in database

    public function addStudent($pdo, Etudiant $etudiant)
    {
        $sql = "INSERT INTO etudiants 
        (
        nom,
        prenom,
        matricule,
        date_naissance
        ) VALUES (
        :nom,
        :prenom,
        :matricule,
        :date_naissance
        );";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom' => $etudiant->getNom(), 'prenom' => $etudiant->getPrenom(), 'matricule' => $etudiant->getMatricule(), 'date_naissance' => $etudiant->getDateNaissance()]);
    }

    // Adding a new subject in database

    public function addSubject($pdo, Matiere $matiere)
    {
        $sql = "INSERT INTO matieres 
        (
        nomMatiere,
        codeMatiere
        ) VALUES (
        :nomMatiere,
        :codeMatiere
        );";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nomMatiere' => $matiere->getNomMatiere(), 'codeMatiere' => $matiere->getCodeMatiere()]);
    }

    // Adding a note to a student regarding the school subject

    public function addNote($pdo, Note $note)
    {
        $sql = "INSERT INTO notes 
        (
        id_etudiant,
        id_matiere,
        valeurNote
        ) VALUES (
        :id_etudiant,
        :id_matiere,
        :valeurNote
        );";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_etudiant' => $note->getIdEtudiant(), 'id_matiere' => $note->getIdMatiere(), 'valeurNote' => $note->getValeurNote()]);
    }

    // --------- CALCULATING STUDENT GRADES ---------

    // Calculating a student's average grade

    public function calculateAverageGrade($pdo, Etudiant $student)
    {

        // Retourne le nombre de notes d'un élève
        $sql = "SELECT count(valeurNote) as 'note'
        FROM notes n
        LEFT JOIN matieres m ON n.id_matiere = m.id
        RIGHT JOIN etudiants e ON n.id_etudiant = e.id
        WHERE e.id = :id_etudiant;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_etudiant' => $student->getId()]);
        $nbNotes = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retourne la somme totale des notes de cet élève
        $sql2 = "SELECT SUM(valeurNote) as 'note'
        FROM notes n
        LEFT JOIN matieres m ON n.id_matiere = m.id
        RIGHT JOIN etudiants e ON n.id_etudiant = e.id
        WHERE e.id = :id_etudiant;";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(['id_etudiant' => $student->getId()]);
        $valueNotes = $stmt2->fetch(PDO::FETCH_ASSOC);

        // On additionne toutes les notes ensemble, puis on les divise par leur nombre

        if ($nbNotes['note'] >= 1) {
            return round($valueNotes['note'] / $nbNotes['note'], 1) . "/20";
        } else {
            return "Il n'y a pas encore de note pour cet élève";
        }
    }

}
