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
                <form method="post" action="<?php echo base_url(); ?>actualizarSucursal" autocomplete="off">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-12 col-sm-6">
                                <label hidden>Código Sucursal:</label>
                                <input class="form-control" id="codigoSucursal" name="codigoSucursal" type="text" required value="<?php echo  $datos['suc_id'];  ?>" hidden>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Nombres:</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" autofocus required value="<?php echo  $datos['suc_nombre'];  ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Dirección:</label>
                                <input class="form-control" id="Direccion" name="Direccion" type="text" value="<?php echo  $datos['suc_direccion']; ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Telefono:</label>
                                <input class="form-control" id="telefono" name="telefono" type="tel" value="<?php echo $datos['suc_telefono']; ?>">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Empresa:</label>
                                <select class="form-control form-select" id="empresa" name="empresa" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($empresas as $empresa) { ?>
                                        <option value="<?php echo $empresa['emp_id']; ?>" <?php if ($empresa['emp_id'] == $datos['suc_empresa']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $empresa['emp_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="text-center" style="padding-top: 20px;padding-bottom: 20px;">
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>sucursales"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
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
            var direccion = $('#Direccion');            
            procesarCadena(nombres);
            procesarCadena(direccion);
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
    </script>