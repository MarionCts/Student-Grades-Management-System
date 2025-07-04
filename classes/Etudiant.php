<?php 

class Etudiant extends Personne {

    private $id;
    private $nom;
    private $prenom;
    private $matricule;

    public function __construct($id, $nom, $prenom, $matricule)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->matricule = $matricule;
    }

    // GETTERS

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getMatricule(){
        return $this->matricule;
    }

    // SETTERS

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setMatricule($matricule){
        $this->matricule = $matricule;
    }
}

?>