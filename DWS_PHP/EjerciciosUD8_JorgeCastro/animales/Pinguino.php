<?php 

include_once "Ave.php";

class Pinguino extends Ave {
    public function programar() {
        echo $this->getDescripcion() . ": Estoy programando en PHP<br>\n";
    }

    public function pia() {
        echo $this->getDescripcion() . ": Soy un pingüino programando en PHP<br>\n";
    }

    public function getComida() {
        return "peces";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public function getClassHierarchy() {
        return "Ave > Pingüino";
    }
}
?>