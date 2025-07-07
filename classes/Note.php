<?php 

// Database
require_once "../includes/Database.php";

class Note {

    private $id;
    private $prenom;
    private $nom;
    private $id_etudiant;
    private $id_matiere;
    private $valeurNote;

    public function __construct($id = null, $prenom = null, $nom = null, $id_etudiant, $id_matiere, $valeurNote) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_etudiant = $id_etudiant;
        $this->id_matiere = $id_matiere;
        $this->valeurNote = $valeurNote;
    }

    // GETTERS

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getIdEtudiant() {
        return $this->id_etudiant;
    }

    public function getIdMatiere() {
        return $this->id_matiere;
    }

    public function getValeurNote() {
        return $this->valeurNote;
    }

    // GETTERS

    public function setId($id) {
        return $this->id = $id;
    }

    public function setNom($nom) {
        return $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        return $this->prenom = $prenom;
    }

    public function setIdEtudiant($id_etudiant) {
        return $this->id_etudiant = $id_etudiant;
    }

    public function setIdMatiere($id_matiere) {
        return $this->id_matiere = $id_matiere;
    }

    public function setValeurNote($valeurNote) {
        return $this->valeurNote = $valeurNote;
    }
}

?>