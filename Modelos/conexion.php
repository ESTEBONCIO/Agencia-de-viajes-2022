<?php

class Conexion
{
    public static function Conectar()
    {
        /** PDO (
         *      "nombre del servidor",
         *      "nombre de la base de datos",
         *      "usuario",
         *      "contrasena"
         *      )
         */
        $servidor = "localhost";
        $base_datos = "agenciaviaje";
        $usuario = "root";
        $contrasena = "";
        $sintaxis = "set names utf8";

        try {
            $link = new PDO(
                "mysql:host=" . $servidor . ";dbname=" . $base_datos,
                $usuario,
                $contrasena
            );

            $link->exec($sintaxis);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $link;
    }
}
