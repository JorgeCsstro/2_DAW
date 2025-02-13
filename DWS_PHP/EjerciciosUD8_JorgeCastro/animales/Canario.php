<?php 

include_once "Ave.php";

class Canario extends Ave {
    public function pia() {
        echo $this->getDescripcion() . ": Pio pio pio<br>";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion() . ", en concreto un Canario";
    }

    public function getClassHierarchy() {
        return parent::getClassHierarchy() . ", en concreto un Canario";
    }
}

?>