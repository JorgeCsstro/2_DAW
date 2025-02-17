<?php 

include_once "Mamifero.php";

class Gato extends Mamifero {
    private $raza;

    public function __construct($sexo = null, $nombre = null, $raza = null) {
        parent::__construct($sexo, $nombre);
        $this->setRaza($raza);
    }

    public function maulla() {
        echo $this->getDescripcion() . ": Miauuuu<br>\n";
    }

    public function getComida() {
        return "pescado";
    }

    public function getRaza(){
        return $this->raza ? $this->raza : "";
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

    public function getJerarquia() {
        return "Mamífero > Gato";
    }
}

?>
