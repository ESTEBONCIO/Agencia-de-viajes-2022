<?php

require_once "conexion.php";

class ModeloFormularios
{
    /*========================================
                TODO - Insert
    =========================================*/
    public static function mdlInsertarFormulario($tabla, $datos)
    {
        $conexion = Conexion::Conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla(
                                                    nombres,
                                                    apellidos,
                                                    correo,
                                                    password
                                                )
                                                VALUES(
                                                    :nombre,
                                                    :apellido,
                                                    :correo,
                                                    :password
                                                )");
        // var_dump($datos);

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            echo '<pre>';
            print_r($stmt->errorInfo());
            echo '</pre>';
        }
        $stmt = null;
    }

    /*========================================
                TODO - Select
    =========================================*/
    public static function mdlSeleccionarFormulario($tabla, $campo, $valor)
    {
        $conexion = Conexion::Conectar();

        if ($campo == null && $valor == null) {
            $stmt = $conexion->prepare("SELECT
                                            cod_hotel,
                                            nombre,
                                            direccion,
                                            ciudad,
                                            telefono,
                                            nro_plazas_dispo
                                            
                                        FROM
                                            $tabla
                                        ORDER BY
                                            cod_hotel
                                        DESC");
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                echo '<pre>';
                print_r($stmt->errorInfo());
                echo '</pre>';
            }
        } else {
            $stmt = $conexion->prepare("SELECT
                                            id,
                                            nombres,
                                            apellidos,
                                            correo,
                                            password,
                                            DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha
                                        FROM
                                            $tabla
                                        WHERE
                                            $campo = :$campo");
            $stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return $stmt->fetch();
            } else {
                echo '<pre>';
                print_r($stmt->errorInfo());
                echo '</pre>';
            }
        }
        $stmt = null;
    }

    /*========================================
                TODO - Actualizar
    =========================================*/
    public static function mdlActualizarFormulario($tabla, $datos)
    {
        $conexion = Conexion::Conectar();
        $stmt = $conexion->prepare("UPDATE
                                        $tabla
                                    SET
                                        cod_hotel= :cod_hotel
                                        nombre = :nombre,
                                        direccion = :direccion,
                                        ciudad = :ciudad,
                                        telefono= :telefono,
                                        nro_plazas_dispo = :nro_plazas_dispo
                                    WHERE
                                        cod_hotel = :cod_hotel");
        // var_dump($datos);

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "OK";
        } else {
            echo '<pre>';
            print_r($stmt->errorInfo());
            echo '</pre>';
        }
        $stmt = null;
    }

    /*========================================
                TODO - Eliminar
    =========================================*/
    public static function mdlElimnarFormulario($tabla, $valor)
    {
        $conexion = Conexion::Conectar();
        $stmt = $conexion->prepare("DELETE
                                    FROM
                                        $tabla
                                    WHERE
                                        id = :id");
        // var_dump($datos);

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "OK";
        } else {
            echo '<pre>';
            print_r($stmt->errorInfo());
            echo '</pre>';
        }
        $stmt = null;
    }
}
