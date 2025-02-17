<?php 

include_once "Animal.php";

abstract class Ave extends Animal {
    private static $totalAves = 0;
    private $sexo;
    private $nombre;

    public function __construct($sexo = 'M', $nombre = null) {
        parent::__construct($sexo, $nombre);
        self::$totalAves++;
    }


    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>\n";
    }


    public static function getTotalAvesCount() {
        return self::$totalAves;
    }


    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function ponerHuevo() {
        if ($this->getSexo() == 'H') {
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

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public function getJerarquia() {
        return "Ave";
    }
}
?>
