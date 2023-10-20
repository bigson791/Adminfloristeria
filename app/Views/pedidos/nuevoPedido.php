<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row" style="padding-top: 8px; padding-bottom: 8px">
                <div class="col-8">
                    <h3 class="mt-4"><?php echo $titulo . ' &#8594 ' . $empresa['emp_nombre'] ?></h3>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img src="<?php echo $empresa['emp_logo'] ?>" height="75px" width="150px">
                    </div>
                </div>
            </div>
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
            <div class="card mb-4">
                <form method="post" action="<?php echo base_url(); ?>insertarProducto" autocomplete="off">
                    <div class="form-group">
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-lg-6 col-sm-6">
                                <label hidden>Código cliente:</label>
                                <input class="form-control" id="codPagina" name="codigoPersona" type="text" value="<?php echo $cliente['cl_id']; ?>" hidden>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <label>Fecha del Pedido</label>
                                <input class="form-control" id="fechaPedido" name="fechaPedido" type="text" value="<?php echo date('Y-m-d') ?>" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-lg-6 col-sm-6">
                                <label>Nombres:</label>
                                <input class="form-control" id="nombres" name="nombres" type="text" value="<?php echo $cliente['cl_nombres']; ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label>Apellidos:</label>
                                <input class="form-control" id="apellidos" name="apellidos" type="text" value="<?php echo $cliente['cl_apellidos']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-6 col-md-6 col-sm-6">
                                <label>Telefono:</label>
                                <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo $cliente['cl_telefono']; ?>" readonly></input>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6">
                                <label>Nit:</label>
                                <input class="form-control" id="nit" name="nit" type="text" value="<?php echo $cliente['cl_nit']; ?>" readonly></input>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-md-12 col-sm-12">
                                <label>Correo:</label>
                                <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo $cliente['cl_correo']; ?>" readonly></input>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-8 col-md-8 col-sm-8">
                                <label>Producto:</label>

                                <div class="input-group mb-3">
                                    <select class="form-control js-example-responsive" id="producto" name="producto" style="width: 100%">
                                        <option value="">Selecciona un producto</option>
                                        <?php foreach ($productos as $producto) { ?>
                                            <option value="<?php echo $producto['pr_id']; ?>" <?php if ($producto['pr_id'] == '1') {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $producto['pr_nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-4 col-md-4 col-sm-4" style=" padding-top: 20px;">
                                <button class=" btn btn-dark" id="addProduct"><i class="fa-solid fa-plus"></i> Agregar</button></span>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-8 col-md-8 col-sm-8">
                                <label>Extra:</label>
                                <select class="form-control js-example-responsive" id="extra" name="extra" style="width: 100%">
                                    <option value="">Selecciona un Extra</option>
                                    <?php foreach ($extras as $extra) { ?>
                                        <option value="<?php echo $extra['pr_id']; ?>" <?php if ($extra['pr_id'] == '1') {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $extra['pr_nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-4 col-md-4 col-sm-4" style="padding-top: 20px;">
                                <button class="btn btn-dark" id="addProduct"><i class="fa-solid fa-plus"></i> Agregar</button>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <th>#</th>
                                    <th>Diseño</th>
                                    <th>Nombre Arreglo</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6 offset-md-8">
                                <label style="font-weight: bold; font-size: 30px; text-align:center;">Total Q.</label>
                                <input type="text" id="total" name="total" size="7" class="form" style="font-weight: bold; font-size: 30px; text-align:center;" readonly value="0.00">
                                <button type="button" class="btn btn-info">Finalizar</button>
                            </div>
                        </div>
                        <div class="text-center" style="padding-top: 20px;">
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>productos"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#producto').select2({
                width: 'resolve'
            });
            $('#extra').select2({
                width: 'resolve'
            });
            $('#urlImgProd').on('keyup', function(event) {
                var urlImagen = $('#urlImgProd').val();
                $('#imgProducto').attr("src", urlImagen);
            });
            var nombre = $('#nombreProducto');
            var descripcion = $('#descripcionProducto');
            procesarInput(nombre);
            procesarInput(descripcion);
            var puntoIngresado = false,
                puntoIngresado2 = false;

            $('#precioNormal').on('input', function(e) {
                var inputValor = $(this).val();

                if (inputValor === "") {
                    // Si el campo está vacío, permitimos que se ingrese un punto nuevamente.
                    puntoIngresado2 = false;
                    return; // No realizamos más validaciones en un campo vacío.
                }

                if (inputValor.includes('.')) {
                    // Si el punto ya está presente, eliminamos puntos adicionales.
                    var partes = inputValor.split('.');
                    inputValor = partes[0] + '.' + partes.slice(1).join('');
                }

                if (isNaN(parseFloat(inputValor))) {
                    // Si el valor no es un número, eliminamos el último carácter ingresado.
                    inputValor = inputValor.slice(0, -1);
                }

                $(this).val(inputValor);
            });



            $('#precioRebajado').on('input', function(e) {
                var inputValor = $(this).val();

                if (inputValor === "") {
                    // Si el campo está vacío, permitimos que se ingrese un punto nuevamente.
                    puntoIngresado2 = false;
                    return; // No realizamos más validaciones en un campo vacío.
                }

                if (inputValor.includes('.')) {
                    // Si el punto ya está presente, eliminamos puntos adicionales.
                    var partes = inputValor.split('.');
                    inputValor = partes[0] + '.' + partes.slice(1).join('');
                }

                if (isNaN(parseFloat(inputValor))) {
                    // Si el valor no es un número, eliminamos el último carácter ingresado.
                    inputValor = inputValor.slice(0, -1);
                }

                $(this).val(inputValor);
            });

            $('#precioRebajado').on('keypress', function(e) {
                var charCode = (e.which) ? e.which : e.keyCode;

                if (charCode === 46 && puntoIngresado2) {
                    // Si se presiona el punto y ya se ha ingresado uno, prevenimos la entrada.
                    e.preventDefault();
                } else if (charCode === 46) {
                    // Si se presiona el punto por primera vez, lo marcamos como ingresado.
                    puntoIngresado2 = true;
                }
            });

            $('#codPagina').on('keypress', function(e) {
                // Obtener el código de la tecla presionada
                var charCode = (e.which) ? e.which : e.keyCode;

                // Verificar si la tecla presionada es un número (0-9)
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    // Si no es un número, prevenimos la entrada
                    e.preventDefault();
                }
            });

            $('#addProduct').on('click', function(e) {
                e.preventDefault();
            })

        });

        function procesarInput(input) {
            input.on('input', function() {
                var texto = input.val();
                var textoLimpio = '';

                // Recorrer cada carácter en el texto de entrada
                for (var i = 0; i < texto.length; i++) {
                    var caracter = texto[i];

                    // Verificar si el carácter es una letra (no es un número) o un espacio en blanco
                    if (caracter.match(/[a-zA-Z\s0-9,]/)) {
                        textoLimpio += caracter.toUpperCase();
                    }
                }

                // Establecer el valor del campo de entrada como el texto modificado
                input.val(textoLimpio);
            });
        }
    </script>