<?php

include_once "Vehiculo.php";

class Coche extends Vehiculo {
    public function llenarDeposito() {
        return "Depósito del coche llenado.<br>";
    }
    
    public function quemaRueda() {
        echo "Estás quemando rueda con el coche!<br>";
    }
    
    public function verKMRecorridos() {
        return "Coche - " . parent::verKMRecorridos();
    }
}

?>