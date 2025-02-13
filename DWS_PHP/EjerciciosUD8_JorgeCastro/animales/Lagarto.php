<?php 

include_once "Animal.php";

class Lagarto extends Animal {

    public function getClassHierarchy() {
        return ", en concreto un Lagarto";
    }

    public function tomarSol() {
        echo $this->getDescripcion() . ": Estoy tomando el Sol<br>";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion() . ", en concreto un Lagarto";
    }
}

?>