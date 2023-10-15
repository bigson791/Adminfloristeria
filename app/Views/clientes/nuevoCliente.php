<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
            <div class="card mb-4">
                <form method="post" action="<?php echo base_url(); ?>insertarCliente" autocomplete="off">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Nombres:</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" autofocus required value="<?php echo set_value('nombre'); ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Apellidos:</label>
                                <input class="form-control" id="apellidos" name="apellidos" type="text" required value="<?php echo set_value('apellidos'); ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Telefono:</label>
                                <input class="form-control" id="telefono" name="telefono" type="tel" required value="<?php echo set_value('telefono'); ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>NIT:</label>
                                <input class="form-control" id="nit" name="nit" type="text" value="<?php echo set_value('nit'); ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Correo:</label>
                                <input class="form-control" id="correo" name="correo" type="email" value="<?php echo set_value('correo'); ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Pais:</label>
                                <select class="form-control" id="pais" name="pais" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($Paises as $pais) { ?>
                                        <option value="<?php echo $pais['ps_cod']; ?>" <?php if ($pais['ps_cod'] == 'GT') {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $pais['ps_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Empresa:</label>
                                <input class="form-control" id="empresa" name="empresa" type="text" required value="1" readonly>
                            </div>
                        </div>
                        <div class="text-center" style="padding-top: 20px;">
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>clientes"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
                var nombres = $('#nombre');
                var apellidos = $('#apellidos');
                var correo = $('#correo');
            convertirEmailAMayusculas(correo);
            procesarInput(nombres);
            procesarInput(apellidos);
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

        function convertirEmailAMayusculas(input) {
            input.on('input', function() {
                var valor = input.val();
                var valorMayusculas = valor.toUpperCase();
                input.val(valorMayusculas);
            });
        }
    </script>