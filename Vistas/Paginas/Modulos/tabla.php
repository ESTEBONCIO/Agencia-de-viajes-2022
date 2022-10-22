<?php
if (!isset($_SESSION['validar_ingreso'])) {
    echo '
    <script>
        window.location="index.php?pagina=registro";
    </script>
    ';
} else {

    if ($_SESSION['validar_ingreso'] != "ok") {
        echo '
        <script>
            window.location="index.php?pagina=registro";
        </script>
        ';
    }
}
$usuarios = ControladorFormularios::ctrSeleccionarFormularios(null, null);

/* echo '<pre>';
print_r($usuarios);
echo '</pre>'; */
?>

<!-- ========================================
                TODO - Tabla
========================================= -->
<div class="container-fluid">
    <div class="container bg-light p-5 text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cod Hotel</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Nro de plazas disponibles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value['cod_hotel']; ?></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['direccion']; ?></td>
                        <td><?php echo $value['ciudad']; ?></td>
                        <td><?php echo $value['telefono']; ?></td>
                        <td><?php echo $value['nro_plazas_dispo']; ?></td>
                        <td>
                            <div class="btn-group">
                                <div class="px-1">
                                    <a href="index.php?pagina=editar&id=<?php echo $value['id']; ?>">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </a>
                                </div>


                                <form action="" method="post">
                                    <input type="hidden" name="eliminar-usuario" value="<?php echo $value['id']; ?>" />

                                    <button type="submit" name="btnElimnar" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <?php
                                    $eliminar = new ControladorFormularios();
                                    $eliminar->ctrEliminarFormularios();
                                    ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>