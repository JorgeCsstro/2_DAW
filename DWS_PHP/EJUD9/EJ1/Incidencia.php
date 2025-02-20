<?php
require_once "./traitDB.php";

class Incidencia {
    use traitDB;

    private static $pendientes = 0;
    private static $incidencias = [];
    private $codigo;
    private $descripcion;
    private $resuelta;
    private $solucion;

    public function __construct($codigo, $descripcion, $resuelta = false, $solucion = "") {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->resuelta = $resuelta;
        $this->solucion = $solucion;
    }

    public static function resetearBD() {
        $sql = "DELETE FROM INCIDENCIA";
        self::execDB($sql);
        self::$pendientes = 0;
        self::$incidencias = [];
    }

    public static function creaIncidencia($codigo, $descripcion) {
        $sql = "INSERT INTO INCIDENCIA (CODIGO, ESTADO, PROBLEMA) VALUES (?, 'Pendiente', ?)";
        self::queryPreparadaDB($sql, [$codigo, $descripcion]);
        self::$pendientes++;
        $incidencia = new self($codigo, $descripcion);
        self::$incidencias[] = $incidencia;
        return $incidencia;
    }

    public function resuelve($solucion) {
        $this->resuelta = true;
        $this->solucion = $solucion;
        $sql = "UPDATE INCIDENCIA SET ESTADO = 'Resuelta', RESOLUCION = ? WHERE CODIGO = ?";
        self::queryPreparadaDB($sql, [$solucion, $this->codigo]);
        self::$pendientes--;
    }

    public function actualizaIncidencia($codigo, $descripcion, $resuelta, $solucion) {
        $sql = "UPDATE INCIDENCIA SET PROBLEMA = ? WHERE CODIGO = ?";
        self::queryPreparadaDB($sql, [$descripcion, $this->codigo]);
        $this->descripcion = $descripcion;
    }

    public function borraIncidencia() {
        $sql = "DELETE FROM INCIDENCIA WHERE CODIGO = ?";
        self::queryPreparadaDB($sql, [$this->codigo]);
    }

    public static function getPendientes() {
        return self::$pendientes . "\n";
    }

    public static function leeIncidencia($codigo) {
        $sql = "SELECT * FROM INCIDENCIA WHERE CODIGO = ?";
        $result = self::queryPreparadaDB($sql, [$codigo]);
        return !empty($result) ? new self($result[0]['CODIGO'], $result[0]['PROBLEMA'], $result[0]['ESTADO'] == 'Resuelta', $result[0]['RESOLUCION']) : null;
    }

    public static function leeTodasIncidencias() {
        $sql = "SELECT * FROM INCIDENCIA";
        $result = self::queryPreparadaDB($sql, []);
        $incidencias = [];
        foreach ($result as $row) {
            $incidencias[] = new self($row['CODIGO'], $row['PROBLEMA'], $row['ESTADO'] == 'Resuelta', $row['RESOLUCION']);
        }
        return $incidencias;
    }

    public function __toString() {
        $estado = $this->resuelta ? "Resuelta" : "Pendiente";
        return "Incidencia {$this->codigo}: {$this->descripcion} - {$estado}\n";
    }

    public function getCodigo() {
        return $this->codigo;
    }
}
