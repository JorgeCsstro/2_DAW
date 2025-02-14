<?php 

include_once "Mamifero.php";

class Gato extends Mamifero {
    public $raza;

    public function __construct($sexo = null, $nombre = null, $raza = null) {
        parent::__construct($sexo, $nombre);
        $this->raza = $raza;
    }

    public function maulla() {
        echo $this->getDescripcion() . ": Miauuuu<br>\n";
    }

    public function getComida() {
        return "pescado";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public static function consSexoNombre($sexo, $nombre) {
        return new static($sexo, $nombre);
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }

    public function getClassHierarchy() {
        return "Mamífero > Gato";
    }
}

?>