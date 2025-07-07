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
        $sql = "SELECT id, nom, prenom, matricule, DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_naissance FROM etudiants";
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
        $sql = "SELECT p.id, p.nom, p.prenom, m.nomMatiere FROM professeurs p INNER JOIN matieres m ON m.id = p.id_matiere;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $professeurs = [];

        foreach ($results as $value) {
            $professeurs[] = new Professeur(
                $value['id'],
                $value['nom'],
                $value['prenom'],
                $value['nomMatiere']
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

    // Getting the list of all grades in database

    public static function listerNotes($pdo)
    {
        $sql = "SELECT e.id, e.nom, e.prenom, n.id_etudiant, m.nomMatiere, n.valeurNote FROM notes n LEFT JOIN matieres m ON m.id = n.id_matiere RIGHT JOIN etudiants e ON e.id = n.id_etudiant WHERE n.valeurNote is NOT NULL;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $notes = [];

        foreach ($results as $value) {
            $notes[] = new Note(
                $value['id'],
                $value['nom'],
                $value['prenom'],
                $value['id_etudiant'],
                $value['nomMatiere'],
                $value['valeurNote'],
            );
        }
        return $notes;
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

        // Returns the total number of grades of the selected student
        $sql = "SELECT count(valeurNote) as 'note'
        FROM notes n
        LEFT JOIN matieres m ON n.id_matiere = m.id
        RIGHT JOIN etudiants e ON n.id_etudiant = e.id
        WHERE e.id = :id_etudiant;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_etudiant' => $student->getId()]);
        $nbNotes = $stmt->fetch(PDO::FETCH_ASSOC);

        // Returns the total sum of all grades from this student
        $sql2 = "SELECT SUM(valeurNote) as 'note'
        FROM notes n
        LEFT JOIN matieres m ON n.id_matiere = m.id
        RIGHT JOIN etudiants e ON n.id_etudiant = e.id
        WHERE e.id = :id_etudiant;";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(['id_etudiant' => $student->getId()]);
        $valueNotes = $stmt2->fetch(PDO::FETCH_ASSOC);

        // Returns the average grade by dividing the total sum by the number of grades

        if ($nbNotes['note'] >= 1) {
            return round($valueNotes['note'] / $nbNotes['note'], 1) . "/20";
        } else {
            return "Il n'y a pas encore de note pour cet élève";
        }
    }

}
