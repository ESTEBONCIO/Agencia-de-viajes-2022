<!-- ========================================
        TODO - Formulario Registro
========================================= -->
<div class="container-fluid">
    <div class="container text-center">
        <div class="d-flex justify-content-center">
            <form action="" class="bg-light p-5" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese su Nombre" name="nombre" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese su Apellido" name="apellido" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="Correo">Correo:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingrese su Correo" name="correo" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha">Contraseña:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" />
                    </div>
                </div>

                <?php
                /*========================================
                TODO - Fomra en que se instancia la clase del metodo no estatico
                =========================================*/
                /* $Datos = new ControladorFormularios();
                $Datos->ctrResgistro(); */

                /*========================================
                TODO - Fomra en que se instancia la clase del metodo estatico
                =========================================*/
                $registro = ControladorFormularios::ctrInsertarFormularios();

                if ($registro == "ok") {
                    echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                }

                echo '
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>
                ';
                ?>

                <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
            </form>
        </div>
    </div>
</div>