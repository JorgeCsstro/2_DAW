<?php 

include_once "Mamifero.php";

class Perro extends Mamifero {
    public $raza;

    public function __construct($sexo = null, $nombre = null, $raza = null) {
        parent::__construct($sexo, $nombre);
        $this->raza = $raza;
    }

    public function ladra() {
        echo $this->getDescripcion() . ": Guau guau<br>\n";
    }

    public function getComida() {
        return "carne";
    }

    public function getRaza(){
        return $this->raza ? " raza $this->raza" : "";
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
        return "Mamífero > Perro";
    }

    public function getDetails() {
        $sexo = ($this->sexo == 'H') ? 'HEMBRA' : 'MACHO';
        $raza = $this->raza ? "raza $this->raza" : "";
        $nombre = $this->nombre ? "llamado $this->nombre" : "y no tengo nombre";
        
        $details = ", con sexo $sexo";
        if ($raza) {
            $details .= ", $raza";
        }
        $details .= ", $nombre";
        return $details;
    }
}

?>