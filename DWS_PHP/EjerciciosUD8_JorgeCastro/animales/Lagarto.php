<?php 

include_once "Animal.php";

class Lagarto extends Animal {

    public function __construct($sexo = 'M', $nombre = null) {
        parent::__construct($sexo, $nombre);
    }

    public function getJerarquia() {
        return "Lagarto";
    }

    public function tomarSol() {
        echo $this->getDescripcion() . ": Estoy tomando el Sol<br>\n";
    }

    public function getComida() {
        return "insectos";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public function setNombre($nombre) {
        parent::setNombre($nombre);
    }
}

?>
