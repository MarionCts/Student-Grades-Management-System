<?php 

class Matiere {

    private $id;
    private $nomMatiere;
    private $codeMatiere;

    public function __construct($id, $nomMatiere, $codeMatiere)
    {
        $this->id = $id;
        $this->nomMatiere = $nomMatiere;
        $this->codeMatiere = $codeMatiere;
    }

    // GETTERS

    public function getId($id){
        return $this->id = $id;
    }

    public function getNomMatiere($nomMatiere){
        return $this->nomMatiere = $nomMatiere;
    }

    public function getCodeMatiere($codeMatiere){
        return $this->codeMatiere = $codeMatiere;
    }

    // SETTERS

    public function setNomMatiere($nomMatiere){
        $this->nomMatiere = $nomMatiere;
    }

    public function setCodeMatiere($codeMatiere){
        $this->codeMatiere = $codeMatiere;
    }
}

?>