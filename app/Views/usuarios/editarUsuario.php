<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo . '&#8594;' . $Usuarios['us_nombres']; ?></h3>
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
            <div class="card mb-4">
                <form method="post" action="<?php echo base_url(); ?>actualizarUsuarios" autocomplete="off">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label hidden>Codigo Usuario:</label>
                                <input class="form-control" id="codigoUsuario" name="codigoUsuario" type="text" value="<?php echo $Usuarios['us_id']; ?>" hidden>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Nombres:</label>
                                <input class="form-control" id="nombres" name="nombres" type="text" autofocus required value="<?php echo $Usuarios['us_nombres']; ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Apellidos:</label>
                                <input class="form-control" id="apellidos" name="apellidos" type="text" required value="<?php echo $Usuarios['us_apellidos']; ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Rol:</label>
                                <select class="form-control form-select" id="rol" name="rol" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($Roles as $rol) { ?>
                                        <option value="<?php echo $rol['rl_id']; ?>" <?php if ($rol['rl_id'] == $Usuarios['us_rol']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $rol['rl_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Caja:</label>
                                <select class="form-control form-select" id="caja" name="caja" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($Cajas as $caja) { ?>
                                        <option value="<?php echo $caja['cj_id']; ?>" <?php if ($caja['cj_id'] ==  $Usuarios['us_id_caja']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $caja['cj_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>empresa:</label>
                                <select class="form-control form-select" id="empresa" name="empresa" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($empresas as $empresa) { ?>
                                        <option value="<?php echo $empresa['emp_id']; ?>" <?php if ($empresa['emp_id'] ==  $Usuarios['us_empresa']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $empresa['emp_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>usuario:</label>
                                <input class="form-control" id="usuario" name="usuario" type="text" required value="<?php echo $Usuarios['us_usuario']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" id="passwrd" name="passwrd" class="form-control" required value="<?php echo set_value('passwrd'); ?>">
                                    <button type="button" class="btn btn-outline-secondary" id="mostrarPassword"><i class="fa-regular fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Repetir Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="repasswrd" name="repasswrd" value="<?php echo set_value('repasswrd'); ?>">
                                    <button type="button" class="btn btn-outline-secondary" id="mostrarrePassword"><i class="fa-regular fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" style="padding-top: 20px; padding-bottom: 20px">
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>usuarios"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            var nombres = $('#nombres');
            var apellidos = $('#apellidos');
            var empresa = $('#empresa');
            procesarInput(nombres);
            procesarInput(apellidos);
            procesarCadena(empresa);

            $("#mostrarPassword").on("click", function() {
                var passwordField = $("#passwrd");
                var passwordType = passwordField.attr("type");

                if (passwordType === "password") {
                    passwordField.attr("type", "text");
                    setTimeout(function() {
                        passwordField.attr("type", "password");
                    }, 5000); // Cambia 5000 por la duración en milisegundos que desees
                }
            });

            $("#mostrarrePassword").on("click", function() {
                var passwordField = $("#repasswrd");
                var passwordType = passwordField.attr("type");

                if (passwordType === "password") {
                    passwordField.attr("type", "text");
                    setTimeout(function() {
                        passwordField.attr("type", "password");
                    }, 5000); // Cambia 5000 por la duración en milisegundos que desees
                }
            });
        });
        $('#telefono').on('keypress', function(e) {
            // Obtener el código de la tecla presionada
            var charCode = (e.which) ? e.which : e.keyCode;

            // Verificar si la tecla presionada es un número (0-9)
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                // Si no es un número, prevenimos la entrada
                e.preventDefault();
            }
        });

        function procesarInput(input) {
            input.on('input', function() {
                var texto = input.val();
                var textoLimpio = '';

                // Recorrer cada carácter en el texto de entrada
                for (var i = 0; i < texto.length; i++) {
                    var caracter = texto[i];

                    // Verificar si el carácter es una letra (no es un número) o un espacio en blanco
                    if (caracter.match(/[a-zA-Z\s]/)) {
                        textoLimpio += caracter.toUpperCase();
                    }
                }

                // Establecer el valor del campo de entrada como el texto modificado
                input.val(textoLimpio);
            });
        }

        function procesarCadena(input) {
            input.on('input', function() {
                var texto = input.val();
                var textoLimpio = '';

                // Recorrer cada carácter en el texto de entrada
                for (var i = 0; i < texto.length; i++) {
                    var caracter = texto[i];

                    // Verificar si el carácter es una letra (no es un número) o un espacio en blanco
                    if (caracter.match(/[a-zA-Z\s0-9-,.]/)) {
                        textoLimpio += caracter.toUpperCase();
                    }
                }

                // Establecer el valor del campo de entrada como el texto modificado
                input.val(textoLimpio);
            });
        }
    </script>