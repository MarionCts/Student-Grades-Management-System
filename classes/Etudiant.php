<?php

// Database
require_once "../includes/Database.php";

// Classes
require_once "../classes/Personne.php";

class Etudiant extends Personne
{

    private $matricule;
    private $dateNaissance;

    public function __construct($id, $nom, $prenom, $matricule, $dateNaissance)
    {
        parent::__construct($id, $nom, $prenom);
        $this->matricule = $matricule;
        $this->dateNaissance = $dateNaissance;
    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getMatricule()
    {
        return $this->matricule;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    // SETTERS

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

}
