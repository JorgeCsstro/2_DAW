<?php 

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

trait GenerarDNI {
    public function generarDNI() {
        $numero = rand(10000000, 99999999);
        $letra = $this->generaLetraDNI($numero % 23);
        return $numero . $letra;
    }

    private function generaLetraDNI($idLetra) {
        $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        return $letras[$idLetra];
    }
}

class Persona {
    use GenerarDNI;

    const INFRAPESO = -1;
    const PESO_IDEAL = 0;
    const SOBREPESO = 1;

    private $nombre;
    private $edad;
    private $dni;
    private $sexo;
    private $peso;
    private $altura;

    public function __construct($nombre = "", $edad = 0, $sexo = 'H', $peso = 0, $altura = 0) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $this->comprobarSexo($sexo);
        $this->peso = $peso;
        $this->altura = $altura;
        $this->dni = $this->generarDNI();
    }

    public static function consFull($nombre, $edad, $sexo, $peso, $altura) {
        return new self($nombre, $edad, $sexo, $peso, $altura);
    }

    public static function consNomEdSex($nombre, $edad, $sexo) {
        return new self($nombre, $edad, $sexo);
    }

    private function comprobarSexo($sexo) {
        return ($sexo == 'H' || $sexo == 'M') ? $sexo : 'H';
    }

    public function calcularIMC() {
        $imc = $this->peso / ($this->altura * $this->altura);
        if ($imc < 20) {
            return self::INFRAPESO;
        } elseif ($imc >= 20 && $imc <= 25) {
            return self::PESO_IDEAL;
        } else {
            return self::SOBREPESO;
        }
    }

    public function strIMC() {
        $imc = $this->calcularIMC();
        if ($imc == self::INFRAPESO) {
            return $this->nombre . " está por debajo de su peso ideal<br>\n";
        } elseif ($imc == self::PESO_IDEAL) {
            return $this->nombre . " está en su peso ideal<br>\n";
        } else {
            return $this->nombre . " tiene sobrepeso<br>\n";
        }
    }

    public function esMayorDeEdad() {
        return print ($this->edad >= 18 ? "$this->nombre es mayor de edad" : "$this->nombre es menor de edad") . "<br>\n";
    }

    public function mostrarIMC() {
        return $this->strIMC();
    }

    public function __toString() {
        
        return "Informacion de la persona:<br>\n" .
               "DNI: " . $this->dni . "<br>\n" .
               "Nombre: " . $this->nombre . "<br>\n" .
               "Sexo: " . ($this->sexo == 'H' ? "Hombre" : "Mujer") . "<br>\n" .
               "Edad: " . $this->edad . "<br>\n" .
               "Peso: " . $this->peso . " Kg<br>\n" .
               "Altura: " . $this->altura . " metros<br>\n" .
               "Resultado IMC: " . $this->strIMC() . "\n";
    }

    // Getters y Setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $this->comprobarSexo($sexo);
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getDni() {
        return $this->dni;
    }
}

?>