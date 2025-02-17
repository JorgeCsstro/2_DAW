<?php 

include_once "Mamifero.php";

class Perro extends Mamifero {

    private $raza = "teckel";

    // Constructor
    public function __construct($sexo = null, $nombre = null, $raza = null) {
        parent::__construct($sexo, $nombre);
        if ($raza != null) {
            $this->setRaza($raza);
        }
    }

    // Accion: ladra
    public function ladra() {
        echo $this->getDescripcion() . ": Guau guau<br>\n";
    }

    // Accion: tipo de comida
    public function getComida() {
        return "carne";
    }

    // Accion: Raza
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
        return "Mamífero > Perro";
    }
}

?>
