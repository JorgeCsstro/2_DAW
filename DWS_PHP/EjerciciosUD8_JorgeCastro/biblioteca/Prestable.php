<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

interface Prestable {
    public function estaPrestado();
    public function presta();
    public function devuelve();
    public function mostrarPrestado();
}
?>