<?php 

include_once "Mamifero.php";

class Perro extends Mamifero {
    public $raza;

    public function __construct($sexo = 'M', $nombre = null, $raza = null) {
        parent::__construct($sexo, $nombre);
        $this->raza = $raza;
    }

    public function ladra() {
        echo $this->getDescripcion() . ": Guau guau<br>";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        $raza = $this->raza ? " raza $this->raza" : "";
        return parent::getDescripcion() . ", en concreto un Perro$raza";
    }

    public static function consSexoNombre($sexo, $nombre) {
        return new static($sexo, $nombre);
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }

    public function getClassHierarchy() {
        return parent::getClassHierarchy() . ", en concreto un Perro";
    }

    public function getDetails() {
        $sexo = ($this->sexo == 'H') ? 'HEMBRA' : 'MACHO';
        $raza = $this->raza ? "raza $this->raza" : "";
        $nombre = $this->nombre ? "llamado $this->nombre" : "y no tengo nombre";
        
        $details = "con sexo $sexo";
        if ($raza) {
            $details .= ", $raza";
        }
        $details .= ", $nombre";
        return $details;
    }
}

?>