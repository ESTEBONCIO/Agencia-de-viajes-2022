<!-- ========================================
        TODO - Formulario Ingreso
========================================= -->
<div class="container-fluid">
    <div class="container text-center">
        <div class="d-flex justify-content-center">
            <form action="" class="bg-light p-5" method="post">
                <div class="form-group">
                    <label for="Correo">Correo:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingrese su Correo" name="correo_ingresar" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha">Contraseña:</label>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password_ingresar" />
                    </div>
                </div>

                <?php
                /*========================================
                TODO - Fomra en que se instancia la clase del metodo estatico
                =========================================*/
                $ingreso = new ControladorFormularios();
                $ingreso->ctrIngresarFormulario();
                ?>

                <button type="submit" class="btn btn-primary" name="btnIngresar">Ingresar</button>
            </form>
        </div>
    </div>
</div>