<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

include_once "Publicacion.php";
include_once "Prestable.php";

class Libro extends Publicacion implements Prestable {
    private $prestado;

    public function __construct($isbn, $titulo, $anio = 2024) {
        parent::__construct($isbn, $titulo, $anio);
        $this->prestado = false;
    }

    public function estaPrestado() {
        return $this->prestado;
    }

    public function presta() {
        if ($this->prestado) {
            echo "No se ha podido prestar, el libro '$this->titulo' ya está prestado.<br>\n";
        } else {
            $this->prestado = true;
            echo "Se ha prestado el libro '$this->titulo'.<br>\n";
        }
    }

    public function devuelve() {
        if ($this->prestado) {
            $this->prestado = false;
            echo "Se ha devuelto el libro '$this->titulo'.<br>\n";
        } else {
            echo "El libro '$this->titulo' no estaba prestado.<br>\n";
        }
    }

    public function mostrarPrestado() {
        if ($this->prestado) {
            echo "El libro '$this->titulo' está prestado<br>\n";
        } else {
            echo "El libro '$this->titulo' no está prestado<br>\n";
        }
    }

    public function __toString() {
        $estado = $this->prestado ? "prestado" : "no prestado";
        return parent::__toString() . " ($estado)<br>\n";
    }
}
?>