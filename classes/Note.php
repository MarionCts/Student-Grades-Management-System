<?php 

// Database
require_once "../includes/Database.php";

class Note {

    private $id;
    private $id_etudiant;
    private $id_matiere;
    private $valeurNote;

    public function __construct($id, $id_etudiant, $id_matiere, $valeurNote) {
        $this->id = $id;
        $this->id_etudiant = $id_etudiant;
        $this->id_matiere = $id_matiere;
        $this->valeurNote = $valeurNote;
    }

    // GETTERS

    public function getId() {
        return $this->id;
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