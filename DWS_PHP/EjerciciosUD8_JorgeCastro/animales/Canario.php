<?php 

include_once "Ave.php";

class Canario extends Ave {
    public function pia() {
        echo $this->getDescripcion() . ": Pio pio pio<br>\n";
    }

    public function getComida() {
        return "alpiste";
    }

    public function alimentarse() {
        parent::alimentarse();
    }

    public function getDescripcion() {
        return parent::getDescripcion();
    }

    public function getClassHierarchy() {
        return "Ave > Canario";
    }
    
}

?>