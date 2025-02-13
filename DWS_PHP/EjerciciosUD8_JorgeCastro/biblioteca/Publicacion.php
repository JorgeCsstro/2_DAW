<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

abstract class Publicacion {
    protected $isbn;
    protected $titulo;
    protected $anio;

    public function __construct($isbn, $titulo, $anio = 2024) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anio = $anio;
    }

    public function __toString() {
        return "ISBN: $this->isbn, título: $this->titulo, año de publicación: $this->anio";
    }
}
?>