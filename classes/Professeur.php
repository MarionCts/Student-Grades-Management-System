<?php

require_once "../includes/Database.php";

class Professeur extends Personne
{

    private $idMatiere;

    public function __construct($id = null, $nom, $prenom, $idMatiere)
    {
        parent::__construct($id, $nom, $prenom);
        $this->idMatiere = $idMatiere;
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

    public function getIdMatiere()
    {
        return $this->idMatiere;
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

    public function setDdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;
    }

}
