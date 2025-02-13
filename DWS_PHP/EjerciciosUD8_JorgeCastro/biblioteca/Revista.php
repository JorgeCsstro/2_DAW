<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

class Revista extends Publicacion {
    private $numero;

    public function __construct($isbn, $titulo, $anio = 2024, $numero) {
        parent::__construct($isbn, $titulo, $anio);
        $this->numero = $numero;
    }

    public function __toString() {
        return parent::__toString() . ", número: $this->numero<br>\n";
    }
}
?>