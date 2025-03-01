<?php 

include_once "Animal.php";

abstract class Mamifero extends Animal {
    public static $totalMamiferos = 0;
    private $raza;

    public function __construct($sexo = 'M', $nombre = null) {
        parent::__construct($sexo, $nombre);
        self::$totalMamiferos++;
    }

    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>\n";
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function amamantar() {
        if ($this->getSexo() == 'H') {
            echo $this->getDescripcion() . ": Amamantando a mis crías<br>\n";
        } else {
            echo $this->getDescripcion() . ": Soy macho, no puedo amamantar<br>\n";
        }
    }

    public function morirse() {
        parent::morirse();
        if (self::$totalMamiferos > 0) {
            self::$totalMamiferos--;
        }
    }

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }

    public function getJerarquia() {
        return "Mamífero";
    }

}

?>
