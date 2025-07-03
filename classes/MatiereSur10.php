<?php
require_once "../classes/Matiere.php"; 
?>

<?php

class MatiereSur10 extends Matiere {
    private $MatiereSur10;

    public function __construct($MatiereSur10) {
        $this->MatiereSur10 = $MatiereSur10;
    }

    public function getMatiereSur10() {
        return $this->MatiereSur10;
    }
}

?>