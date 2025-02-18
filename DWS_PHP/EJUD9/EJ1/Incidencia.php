<?php 

class Incidencia {
    private static $pendientes = 0;
    private static $incidencias = [];
    private $codigo;
    private $descripcion;
    private $resuelta;
    private $solucion;

    public static function resetearBD() {
        self::$pendientes = 0;
        self::$incidencias = [];
    }

    public static function creaIncidencia($codigo, $descripcion) {
        $incidencia = new self($codigo, $descripcion);
        self::$incidencias[] = $incidencia;
        self::$pendientes++;
        return $incidencia;
    }

    public function __construct($codigo, $descripcion) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->resuelta = false;
        $this->solucion = "";
    }

    public function resuelve($solucion) {
        $this->resuelta = true;
        $this->solucion = $solucion;
        self::$pendientes--;
    }

    public function actualizaIncidencia($codigo, $descripcion, $resuelta, $solucion) {
        if ($descripcion !== "") {
            $this->descripcion = $descripcion;
        }
        // Actualizar otros campos si es necesario
    }

    public function borraIncidencia() {
        $index = array_search($this, self::$incidencias);
        if ($index !== false) {
            array_splice(self::$incidencias, $index, 1);
            if (!$this->resuelta) {
                self::$pendientes--;
            }
        }
    }

    public static function getPendientes() {
        return self::$pendientes;
    }

    public static function leeIncidencia($codigo) {
        foreach (self::$incidencias as $incidencia) {
            if ($incidencia->codigo == $codigo) {
                return $incidencia;
            }
        }
        return null;
    }

    public static function leeTodasIncidencias() {
        return self::$incidencias;
    }

    public function __toString() {
        $estado = $this->resuelta ? "Resuelta" : "Pendiente";
        return "Incidencia {$this->codigo}: {$this->descripcion} - {$estado}\n";
    }

    public function getCodigo() {
        return $this->codigo;
    }
}

?>