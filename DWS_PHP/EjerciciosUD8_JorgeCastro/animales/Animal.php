<?php 

abstract class Animal {
    public static $totalAnimales = 0;
    public $sexo;
    public $nombre = "";

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
        echo $this->getDescripcion() . ": Estoy comiendo " . $this->getComida() . "<br>\n";
    }

    public function morirse() {
        echo $this->getDescripcion() . ": Adiós!<br>\n";

        if (self::$totalAnimales > 0) {
            self::$totalAnimales--;
        }
    }

    public function getDescripcionCompleta() {
        $desc = "Soy un Animal";
        $classHierarchy = explode(" > ", $this->getClassHierarchy());
    
        if ($classHierarchy[0] == "Lagarto") {

            $desc .= ", en concreto un " . $classHierarchy[0];
        } else if(count($classHierarchy) == 1){

            $desc .= ", un " . $classHierarchy[0];
        }else{

            $desc .= ", un " . $classHierarchy[0] . ", en concreto un " . $classHierarchy[1];
        }
    
        $desc .= $this->getDetails();
        return $desc;
    }
    
    

    public function getDescripcion() {
        $classHierarchy = explode(" > ", $this->getClassHierarchy());
        if (count($classHierarchy) == 2) {
            $desc = $classHierarchy[1];
        }else{
            $desc = $this->getClassHierarchy();
        }
        $nombre = $this->nombre ? " " . $this->nombre : "";
        $desc .= $nombre;
        return $desc;
    }

    public function getComida(){
        return "";
    }

    public function getRaza(){
        return "";
    }

    public function getClassHierarchy() {
        return "Animal";
    }

    public function getDetails() {
        $classHierarchy = explode(" > ", $this->getClassHierarchy());
        $sexo = ($this->sexo == 'H') ? 'HEMBRA' : 'MACHO';
        $nombre = $this->nombre ? " " . $this->nombre : "";
        $details = ", con sexo $sexo";
        if ($classHierarchy[0] == "Mamífero" ) {
            $details .= ", raza " . $this->getRaza();
            if ($nombre == "") {
                $details .= " y no tengo nombre";
            }else{
                $details .= " y mi nombre es " . $nombre;
            }
        }else{
            $details .= ", llamado" . $nombre;
        }
        return $details;
    }

    public function __toString() {
        return $this->getDescripcionCompleta() . "<br>\n";
    }

    public static function consSexo($sexo) {
        return new static($sexo);
    }

    public static function consFull($sexo, $nombre, $raza = null) {
        return new static($sexo, $nombre, $raza);
    }
}

?>
