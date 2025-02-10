<?php

include_once "Terminal.php";

class Movil extends Terminal {
    public $tarifa;
    public $costeTotal = 0;
    
    public static $tarifas = [
        "rata" => 0.06,
        "mono" => 0.12,
        "bisonte" => 0.30
    ];
    
    public function __construct($numero, $tarifa) {
        parent::__construct($numero);
        $this->tarifa = $tarifa;
    }
    
    public function llama($terminal, $segundosDeLlamada) {
        $this->tiempoConversacion += $segundosDeLlamada;
        $terminal->incrementaTiempo($segundosDeLlamada);
        $this->costeTotal += ($segundosDeLlamada / 60) * self::$tarifas[$this->tarifa];
    }
    
    public function incrementaTiempo($segundos) {
        $this->tiempoConversacion += $segundos;
    }
    
    public function __toString() {
        $minutos = intdiv($this->tiempoConversacion, 60);
        $segundos = $this->tiempoConversacion % 60;
        return "Nº {$this->numero} - {$minutos} m y {$segundos}s de conversación en total - tarificados {$minutos} m y {$segundos} s por un importe de " . number_format($this->costeTotal, 2) . " euros";
    }
}

?>