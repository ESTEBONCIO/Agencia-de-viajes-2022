<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejemplo MVC</title>

    <!-- ========================================
              TODO - PLUGINS CSS
    ========================================= -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />

    <!-- ========================================
              TODO - PLUGINS JS
    ========================================= -->
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b66328b7ad.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include "Paginas/Modulos/logo.php";
    include "Paginas/Modulos/header.php";

    //$pagina = $_GET["pagina"];

    #Isset() Determina si una variable esta definida y no es null
    if (isset($_GET["pagina"])) {
        switch ($_GET["pagina"]) {
            case "registro":
                include "Paginas/registro.php";
                break;
            case "ingreso":
                include "Paginas/ingreso.php";
                break;
            case "inicio":
                include "Paginas/inicio.php";
                break;
            case "salir":
                include "Paginas/salir.php";
                break;
            case "editar":
                include "Paginas/Modulos/editar.php";
                break;
            default:
                include "Paginas/Modulos/error.php";
        }
    } else {
        include "Paginas/registro.php";
    }
    ?>

</body>

</html>