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
                <form method="post" action="<?php echo base_url(); ?>insertarZonaEnvio" autocomplete="off">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Departamento:</label>
                                <select class="form-control form-select" id="departamentos" name="departamentos" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php foreach ($departamentos as $departamento) { ?>
                                        <option value="<?php echo $departamento['dep_id']; ?>" <?php if ($departamento['dep_id'] == '0') {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $departamento['dep_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Municipios:</label>
                                <select name="municipios" id="municipios" class="form-control form-select" required>
                                    <option value="">Selecciona una opción</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-6 col-sm-6">
                                <label>Zona:</label>
                                <input class="form-control" id="zona" name="zona" type="text" required value="<?php echo set_value('zona'); ?>">
                            </div>
                            <div class="col-6 col-sm-6">
                                <label>Nombre Zona:</label>
                                <input class="form-control" id="nomZona" name="nomZona" type="text" value="<?php echo set_value('nomZona'); ?>" required>
                            </div>
                            <div class="col-6 col-sm-6">
                                <label>Costo Envío:</label>
                                <input class="form-control" id="costoEnvio" name="costoEnvio" type="text" required value="<?php echo set_value('costoEnvio'); ?>">
                            </div>
                            <div class="col-6 col-sm-6">
                                <label>Ruta:</label>
                                <input class="form-control" id="ruta" name="ruta" type="text" value="<?php echo set_value('ruta'); ?>">
                            </div>
                        </div>
                        <div class="text-center" style="padding-top: 20px; padding-bottom: 20px">
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>zonasEnvios"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            var nombres = $('#nomZona');
            var zona = $('#zona');
            procesarCadena(nombres);
            procesarCadena(zona);
            $('#departamentos').on('change', function() {
                codigoDepto = $(this).val();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>obtenerMunicipios/" + codigoDepto,
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        var $select = $('#municipios');

                        // Limpiar el select (opcional)
                        $select.empty().append('<option value="">Selecciona una opción</option>');

                        // Agregar opciones al select basadas en la respuesta AJAX
                        $.each(response, function(index, item) {
                            $select.append($('<option>', {
                                value: item.mun_id,
                                text: item.mun_nombre
                            }));
                        });

                    }
                });
            });
            
           
            $('#costoEnvio').on('input', function(e) {
                var inputValor = $(this).val();

                // Remover caracteres no numéricos, excepto un punto decimal
                inputValor = inputValor.replace(/[^\d.]/g, '');
                // Verificar que el valor sea un número decimal válido
                if (isNaN(parseFloat(inputValor))) {
                    inputValor = "";
                }
                // Garantizar que solo haya un punto decimal
                if (inputValor.indexOf('.') !== inputValor.lastIndexOf('.')) {
                    inputValor = inputValor.slice(0, inputValor.lastIndexOf('.'));
                }
                $(this).val(inputValor);
            });

        });
        $('#ruta').on('keypress', function(e) {
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