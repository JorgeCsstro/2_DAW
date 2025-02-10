<?php

include_once "Vehiculo.php";

class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "Estás haciendo el caballito con la bicicleta!<br>";
    }
    
    public function ponerCadena() {
        echo "Has puesto la cadena a la bicicleta.<br>";
    }
    
    public function verKMRecorridos() {
        return "Bicicleta - " . parent::verKMRecorridos();
    }
}

?>