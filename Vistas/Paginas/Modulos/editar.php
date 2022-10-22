<?php
if (isset($_GET['id'])) {
    $campo = 'id';
    $valor = $_GET['id'];

    $usuario = ControladorFormularios::ctrSeleccionarFormularios($campo, $valor);

    /* 
    echo '<pre>';
    print_r($usuario);
    echo '</pre>';
     */
}
?>

<!-- ========================================
        TODO - Formulario Editar
========================================= -->
<div class="container-fluid">
    <div class="container text-center">
        <h4 class="bg-light p-3 text-primary">Edite los campos</h4>
        <div class="d-flex justify-content-center">
            <form action="" class="bg-light p-3" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese su Nombre" name="actualizar-nombre" value="<?php echo $usuario['nombres']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese su Apellido" name="actualizar-apellido" value="<?php echo $usuario['apellidos']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingrese su Correo" name="actualizar-correo" value="<?php echo $usuario['correo']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese contraseña" name="actualizar-password" />
                    </div>
                </div>

                <input type="hidden" class="form-control" name="id-usuario" value="<?php echo $usuario['id']; ?>" />
                <input type="hidden" class="form-control" name="actual-password" value="<?php echo $usuario['password']; ?>" />

                <?php
                $actualizar = ControladorFormularios::ctrActualizarFormularios();

                if ($actualizar == "OK") {
                    echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';

                    echo '
                    <script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
    
                        setTimeout(function(){
                            window.location="index.php?pagina=inicio";
                        }, 2000);
                    </script>
                    ';
                }
                ?>

                <button type="submit" class="btn btn-primary" name="btnActualizar">Actualizar</button>
            </form>
        </div>
    </div>
</div>