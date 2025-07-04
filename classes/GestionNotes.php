<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Personne.php";
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

}
