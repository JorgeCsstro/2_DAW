<?php

trait traitDB
{
    public static function connectDB()
    {
        try {
            $host = "localhost:33006";
            $ddbb = "INCIDENCIAS";
            $root = "root";
            $pass = "dbrootpass";
            
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$host;dbname=$ddbb", $root, $pass);
            // Configurar el modo de error de PDO a excepción
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        // Devuelve la conexión creada
        return $conn;
    }

    public static function execDB($sql)
    {
        // Usa la conexión, ejecuta la sentencia y devuelve el número de filas afectadas
        $conn = self::connectDB();
        $affectedRows = $conn->exec($sql);
        return $affectedRows;
    }

    public static function queryPreparadaDB($sql, $parametros)
    {
        // Usa la conexión, prepara la sentencia, la ejecuta con los parámetros y devuelve el resultado con todas las filas del conjunto
        $conn = self::connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($parametros);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function resetearBD()
    {
        $conn = self::connectDB();
        $sql = "USE INCIDENCIAS";
        $conn->exec($sql);
        $sql = "DELETE FROM INCIDENCIA";
        $conn->exec($sql);
        // $sql = "DROP TABLE INCIDENCIA IF EXISTS";
        // $conn->exec($sql);
        // $sql = "CREATE TABLE INCIDENCIA (
        //     CODIGO INTEGER,
        //     ESTADO VARCHAR (100) NOT NULL,
        //     PUESTO VARCHAR (15),
        //     PROBLEMA VARCHAR(255),
        //     RESOLUCION VARCHAR(255),
        //     CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
        // )";
        // $conn->exec($sql);
    }
}