<?php
require_once "Controladores/plantilla.controlador.php";

require_once "Controladores/formularios.comtrolador.php";
require_once "Modelos/formularios.modelo.php";

/* 
$conexion = Conexion::Conectar();
echo '<pre>';
print_r($conexion);
echo '</pre>';
 */

$plantilla = new ControladorPlantilla();
$plantilla->ctrTraerPlantilla();
