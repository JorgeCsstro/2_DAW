<?php
class Vehiculo {
    protected static $vehiculosCreados = 0;
    protected static $kilometrosTotales = 0;
    protected $kilometrosRecorridos = 0;
    
    public function __construct() {
        self::$vehiculosCreados++;
    }
    
    public function avanza($km) {
        $this->kilometrosRecorridos += $km;
        self::$kilometrosTotales += $km;
    }
    
    public function verKMRecorridos() {
        return "Kilómetros recorridos: $this->kilometrosRecorridos km<br>";
    }
    
    public static function verKMTotales() {
        return "Kilómetros totales: " . self::$kilometrosTotales . " km<br>";
    }
    
    public static function verVehiculosCreados() {
        return "Vehículos creados: " . self::$vehiculosCreados . "<br>";
    }
}

?>
