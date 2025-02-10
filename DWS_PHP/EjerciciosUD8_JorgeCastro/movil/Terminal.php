<?php 

abstract class Terminal {
    public $numero;
    public $tiempoConversacion = 0;
    
    public function __construct($numero) {
        $this->numero = $numero;
    }
    
    public function __toString() {
        $minutos = intdiv($this->tiempoConversacion, 60);
        $segundos = $this->tiempoConversacion % 60;
        return "Nº {$this->numero} – {$minutos} m y {$segundos}s de conversación en total";
    }
    
    abstract public function llama($terminal, $segundosDeLlamada);
}

?>
