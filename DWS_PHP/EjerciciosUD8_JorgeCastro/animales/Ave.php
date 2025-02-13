<?php 

include_once "Animal.php";

abstract class Ave extends Animal {
    public static $totalAves = 0;

    public function __construct($sexo = 'M', $nombre = null) {
        parent::__construct($sexo, $nombre);
        self::$totalAves++;
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>\n";
    }

    public function ponerHuevo() {
        if ($this->sexo == 'H') {
            echo $this->getDescripcion() . ": He puesto un huevo!<br>\n";
        } else {
            echo $this->getDescripcion() . ": Soy macho, no puedo poner huevos<br>\n";
        }
    }

    public function morirse() {
        parent::morirse();
        if (self::$totalAves > 0) {
            self::$totalAves--;
        }
    }

    public function getClassHierarchy() {
        return ", un Ave";
    }
    
    public function getDescripcion() {
        return parent::getDescripcion() . ", en concreto un Ave\n";
    }
}

?>