<?php

require_once "../includes/Database.php";

class Professeur extends Personne
{

    private $codeMatiere;

    public function __construct($id, $nom, $prenom, $codeMatiere)
    {
        parent::__construct($id, $nom, $prenom);
        $this->codeMatiere = $codeMatiere;
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

    public function getCodeMatiere()
    {
        return $this->codeMatiere;
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

    public function setCodeMatiere($codeMatiere)
    {
        $this->codeMatiere = $codeMatiere;
    }

}
