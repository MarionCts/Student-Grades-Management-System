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

    public function getId(){
        return $this->id;
    }

    public function getNomMatiere(){
        return $this->nomMatiere;
    }

    public function getCodeMatiere(){
        return $this->codeMatiere;
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