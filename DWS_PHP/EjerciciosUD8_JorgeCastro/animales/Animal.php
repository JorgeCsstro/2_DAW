<?php 

abstract class Animal {
    public static $totalAnimales = 0;
    private $sexo;
    private $nombre;

    public function __construct($sexo = 'M', $nombre = null) {
        $this->setSexo($sexo);
        $this->setNombre($nombre);
        self::$totalAnimales++;
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

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>\n";
    }

    public function dormirse() {
        echo $this->getDescripcion() . ": Zzzzzzz<br>\n";
    }

    public function alimentarse() {
        echo $this->getDescripcion() . ": Estoy comiendo " . $this->getComida() . "<br>\n";
    }

    public function morirse() {
        echo $this->getDescripcion() . ": Adiós!<br>\n";
        if (self::$totalAnimales > 0) {
            self::$totalAnimales--;
        }
    }

    public function getDescripcion() {
        $jerarquia = explode(" > ", $this->getJerarquia());
        if (count($jerarquia) == 2) {
            $desc = $jerarquia[1];
        } else {
            $desc = $this->getJerarquia();
        }
        $nombre = $this->getNombre() ? " " . $this->getNombre() : "";
        $desc .= $nombre;
        return $desc;
    }

    public function getComida(){
        return "";
    }

    public function getRaza(){
        return "";
    }

    public function getJerarquia() {
        return "Animal";
    }

    public function getDetalles() {
        $jerarquia = explode(" > ", $this->getJerarquia());
        $sexo = ($this->getSexo() == 'H') ? 'HEMBRA' : 'MACHO';
        $nombre = $this->getNombre() ? $this->getNombre() : "";

        $detalles = ", con sexo $sexo";

        if ($jerarquia[0] == "Mamífero") {
            $detalles .= ", raza " . $this->getRaza();
            if ($nombre == "") {
                $detalles .= " y no tengo nombre";
            } else {
                $detalles .= " y mi nombre es " . $nombre;
            }
        } else {
            $detalles .= ", llamado " . $nombre;
        }
        return $detalles;
    }

    public function __toString() {
        $desc = "Soy un Animal";
        $jerarquia = explode(" > ", $this->getJerarquia());
    
        if ($jerarquia[0] == "Lagarto") {
            $desc .= ", en concreto un " . $jerarquia[0];
        } else if(count($jerarquia) == 1){
            $desc .= ", un " . $jerarquia[0];
        } else {
            $desc .= ", un " . $jerarquia[0] . ", en concreto un " . $jerarquia[1];
        }
    
        $desc .= $this->getdetalles();
        return $desc . "<br>\n";
    }

    public static function consSexo($sexo) {
        return new static($sexo);
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }
}

?>
