<?php 

abstract class Animal {
    public static $totalAnimales = 0;
    public $sexo;
    public $nombre;

    public function __construct($sexo = 'M', $nombre = null) {
        $this->sexo = $sexo;
        $this->nombre = $nombre;
        self::$totalAnimales++;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>\n";
    }

    public function dormirse() {
        echo $this->getDescripcion() . ": Zzzzzzz<br>\n";
    }

    public function alimentarse() {
        echo $this->getDescripcion() . ": Estoy comiendo<br>\n";
    }

    public function morirse() {
        echo $this->getDescripcion() . ": Adiós!<br>\n";
        
        // Solo restar si el animal aún existe
        if (self::$totalAnimales > 0) {
            self::$totalAnimales--;
        }
    }

    public function getDescripcion() {
        $desc = "Soy un Animal";
        $desc .= $this->getClassHierarchy();
        $desc .= $this->getDetails();
        return $desc;
    }

    public function getClassHierarchy() {
        return "";
    }

    public function getDetails() {
        $sexo = ($this->sexo == 'H') ? 'HEMBRA' : 'MACHO';
        $nombre = $this->nombre ? ", llamado $this->nombre" : "";
        return ", con sexo $sexo" . $nombre;
    }

    public function __toString() {
        return $this->getDescripcion() . "<br>\n";
    }

    public static function consSexo($sexo) {
        return new static($sexo);
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }
}

?>