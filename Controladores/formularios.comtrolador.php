<?php

class ControladorFormularios
{
    /*========================================
            TODO - Registro
    =========================================*/
    public function ctrResgistro()
    {
        if (isset($_POST['btnEnviar'])) {
            echo $nombre = $_POST["nombre"] . "<br/>";
            echo $apellido = $_POST["apellido"] . "<br/>";
            echo $correo = $_POST["correo"] . "<br/>";
            echo $password = $_POST["password"] . "<br/>";
        } else {
            echo "No hay datos";
        }
    }

    public static function ctrRespuestaRegistro()
    {
        if (isset($_POST['btnEnviar'])) {
            return "ok";
        }
    }

    /*========================================
            TODO - Insertar Registro
    =========================================*/
    public static function ctrInsertarFormularios()
    {
        if (isset($_POST['btnEnviar'])) {
            $tabla = "hotel";
            $datos = array(
                "cod_hotel" => $_POST["cod_hotel"],
                "nombre" => $_POST["nombre"],
                "direccion" => $_POST["direccion"],
                "ciudad" => $_POST["ciudad"],
                "telefono" => $_POST["telefono"]
            );
            $respuesta = ModeloFormularios::mdlInsertarFormulario($tabla, $datos);
            return $respuesta;
        }
    }

    /*========================================
            TODO - Selecionar Registros
    =========================================*/
    public static function ctrSeleccionarFormularios($campo, $valor)
    {
        $tabla = "hotel";
        $respuesta = ModeloFormularios::mdlSeleccionarFormulario($tabla, $campo, $valor);
        return $respuesta;
    }

    /*========================================
            TODO - Ingresar Registros
    =========================================*/
    public function ctrIngresarFormulario()
    {
        if (isset($_POST['btnIngresar'])) {
            $tabla = "registros";
            $campo = "correo";
            $valor = $_POST['correo_ingresar'];
            $password = $_POST['password_ingresar'];

            $respuesta = ModeloFormularios::mdlSeleccionarFormulario($tabla, $campo, $valor);

            if ($respuesta['correo'] == $valor && $respuesta['password'] == $password) {
                echo '<div class="alert alert-success">Ingreso exitoso</div>';

                $_SESSION['validar_ingreso'] = "ok";

                echo '
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }

                    window.location="index.php?pagina=inicio";
                </script>
                ';
            } else {
                echo '<div class="alert alert-danger">Error al ingresar</div>';

                echo '
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>
                ';
            }
            /* 
            echo '<pre>';
            print_r($respuesta);
            echo '</pre>';
             */
        }
    }

    /*========================================
            TODO - Actualizar Registros
    =========================================*/
    public static function ctrActualizarFormularios()
    {
        if (isset($_POST['btnActualizar'])) {
            $tabla = "hotel";

            if ($_POST['actualizar-password'] != "") {
                $password = $_POST["actualizar-password"];
            } else {
                $password = $_POST["actual-password"];
            }

            $datos = array(
                "cod_hotel" => $_POST["cod_hotel"],
                "nombre" => $_POST["nombre"],
                "direccion" => $_POST["direccion"],
                "ciudad" => $_POST["correo"],
                "telefono" => $_POST["telefono"],
                "nro_plazas_dispo" => $_POST["nro_plazas_dispo"],
            );
            $respuesta = ModeloFormularios::mdlActualizarFormulario($tabla, $datos);

            return $respuesta;
        }
    }

    /*========================================
            TODO - Eliminar Registros
    =========================================*/
    public static function ctrEliminarFormularios()
    {
        if (isset($_POST["btnElimnar"])) {
            $tabla = "registros";
            $valor = $_POST['eliminar-usuario'];

            $respuesta = ModeloFormularios::mdlElimnarFormulario($tabla, $valor);

            if ($Registros = "OK") {
                echo '
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }

                    window.location="index.php?pagina=inicio";
                </script>
                ';
            }
        }
    }
}
