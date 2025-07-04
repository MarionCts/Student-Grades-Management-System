<?php

abstract class Personne
{

    protected $id;
    protected $nom;
    protected $prenom;

    public function __construct($id, $nom, $prenom)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    abstract public function getId();
    abstract public function getNom();
    abstract public function getPrenom();
};
