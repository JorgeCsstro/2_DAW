<?php 

include_once "Ave.php";

class Pinguino extends Ave {
    public function programar() {
        echo $this->getDescripcion() . ": Estoy programando en PHP<br>";
    }

    public function pia() {
        echo $this->getDescripcion() . ": Soy un pingüino programando en PHP<br>";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion() . ", en concreto un Pingüino";
    }

    public function getClassHierarchy() {
        return parent::getClassHierarchy() . ", en concreto un Pingüino";
    }
}
?>