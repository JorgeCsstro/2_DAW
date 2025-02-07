<?php

class Incidencia{
    public $puesto;
    public $descripcion;
    public $estado;
    public $resuelto;
    public $numIncidencia;
    private static $contador = 1;
    private static $pendientes = 0;


    function __construct($puesto, $descripcion) {
        $this->puesto = $puesto;
        $this->descripcion = $descripcion;
        $this->estado = "Pendiente";
        $this->resuelto = "";
        $this->numIncidencia = self::$contador++;
        self::$pendientes++;
    }

    function resuelve($resuelto) {
        if ($this->estado === "Pendiente") {
            $this->estado = "Resuelta";
            $this->resuelto = $resuelto;
            self::$pendientes--;
        }
    }

    function __toString() {
        $print = "Incidencia $this->numIncidencia - Puesto $this->puesto - $this->descripcion - $this->estado";
        if ($this->estado == "Resuelta") {
            $print = $print . " - $this->resuelto";
        }
        $print = $print . "\n";
        return $print;
    }

    static function getPendientes() {
        return self::$pendientes;
    }
}

?>