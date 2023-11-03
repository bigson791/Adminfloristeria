<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" id="contenedor">
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
                <form method="post" id="formularioPedido" autocomplete="off">
                    <div class="form-group">
                        <div id="datosCliente" class="row" style="padding-left: 32px; padding-right: 32px; padding-top: 15px">
                            <div class="alert alert-dark" role="alert" style="background-color:slategray; color:white; font-weight: bold;">
                                <div class="row">
                                    <div class="col-8">
                                        Datos del Cliente
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <i class="fa-solid fa-chevron-down" id="mostrarAgregarProductos" style="float:right; padding-top: 5px" onclick="showHideForm('formDatosCliente')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-bottom: 20px; padding-right: 20px;" id="formDatosCliente">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <label hidden>Código cliente:</label>
                                    <input class="form-control" id="codigoPersona" name="codigoPersona" type="text" value="<?php echo $cliente['cl_id']; ?>" hidden>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <label>Fecha del Pedido</label>
                                    <input class="form-control" id="fechaPedido" name="fechaPedido" type="text" value="<?php date_default_timezone_set('America/Guatemala');
                                                                                                                        echo date('Y-m-d') ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <label>Nombres:</label>
                                    <input class="form-control" id="nombres" name="nombres" type="text" value="<?php echo $cliente['cl_nombres']; ?>" readonly>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <label>Apellidos:</label>
                                    <input class="form-control" id="apellidos" name="apellidos" type="text" value="<?php echo $cliente['cl_apellidos']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Telefono:</label>
                                    <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo $cliente['cl_telefono']; ?>" readonly></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Nit:</label>
                                    <input class="form-control" id="nit" name="nit" type="text" value="<?php echo $cliente['cl_nit']; ?>" readonly></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
                                    <label>Correo:</label>
                                    <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo $cliente['cl_correo']; ?>" readonly></input>
                                </div>
                            </div>
                        </div>
                        <div id="datosEntrega" class="row" style="padding-left: 32px; padding-right: 32px;">
                            <div class="alert alert-dark" role="alert" style="background-color:slategray; color:white; font-weight: bold;">
                                <div class="row">
                                    <div class="col-8">
                                        Datos de la Entrega
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <i class="fa-solid fa-chevron-down" id="mostrarAgregarExtra" style="float:right; padding-top: 5px" onclick="showHideForm('formDatosEntrega')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="formDatosEntrega" style="padding-left: 20px; padding-bottom: 20px; padding-right: 20px;">
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Nombre Recibe:</label>
                                    <input class="form-control" id="nomRecibe" name="nomRecibe" type="text" required></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Fecha Entrega:</label>
                                    <input class="form-control" id="fechaEntrega" name="fechaEntrega" type="date" required></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Telefono Recibe:</label>
                                    <input class="form-control" id="telRecibe" name="telRecibe" type="tel" required></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Departamento Entrega:</label>
                                    <select class="form-control form-select" id="departamentos" name="departamentos" required>
                                        <option value="">Selecciona una opción</option>
                                        <?php foreach ($departamentos as $departamento) { ?>
                                            <option value="<?php echo $departamento['dep_id']; ?>" <?php if ($departamento['dep_id'] == '0') {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $departamento['dep_nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Municipio Entrega:</label>
                                    <select name="municipios" id="municipios" class="form-control form-select" required>
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Zona Entrega:</label>
                                    <select class="form-control form-select" id="zonaEntrega" name="zonaEntrega" required>
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
                                    <label>Dirección Entrega:</label>
                                    <input class="form-control" id="dirEntrega" name="dirEntrega" type="text" required></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-4 col-sm-4">
                                    <label>Firma</label>
                                    <input class="form-control" id="firma" name="firma" type="text"></input>
                                </div>
                                <div class="col-4 col-md-4 col-sm-4">
                                    <label>Costo del Envío(Q.):</label>
                                    <input class="form-control" id="costoEnvio" name="costoEnvio" type="text" required></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
                                    <label>Texto para la tarjeta:</label>
                                    <textarea class="form-control" id="leyendatarjeta" name="leyendatarjeta" type="text" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="otrosDatos" class="row" style="padding-left: 32px; padding-right: 32px;">
                            <div class="alert alert-dark" role="alert" style="background-color:slategray; color:white; font-weight: bold;">
                                <div class="row">
                                    <div class="col-8">
                                        Otros Datos
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <i class="fa-solid fa-chevron-down" id="mostrarAgregarProductos" style="float:right; padding-top: 5px" onclick="showHideForm('mostrarFormOtrosDatos')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px; display:none" id="mostrarFormOtrosDatos">
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <label># Orden Pagina Web:</label>
                                    <input class="form-control" id="ordenPW" name="ordenPW" type="text"></input>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <label>Forma de pago:</label>
                                    <select class="form-control form-select" id="formaPago" name="formaPago" required>
                                        <option value="">Selecciona una opción</option>
                                        <option value="Tarjeta">Tarjeta Crédito ó Débido</option>
                                        <option value="Deposito">Deposito Bancario</option>
                                        <option value="Link de Pago">Link de pago</option>
                                        <option value="Remesa">Remesa</option>
                                        <option value="Efectivo">Efectivo</option>
                                    </select>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <label>Comprobante:</label>
                                    <input class="form-control" id="comprobante" name="comprobante" type="text"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label>Sucursal en donde se fabricará:</label>
                                    <select class="form-control form-select" id="fabrica" name="fabrica" required>
                                        <option value="">Selecciona una opción</option>
                                        <?php foreach ($sucursales as $sucursal) { ?>
                                            <option value="<?php echo $sucursal['suc_id']; ?>" <?php if ($sucursal['suc_id'] == '0') {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $sucursal['suc_nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label>Observaciones Adicionales:</label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" type="text" rows="4"></textarea>
                                </div>

                            </div>
                        </div>
                        <div id="agregarProductos" class="row" style="padding-left: 32px; padding-right: 32px;">
                            <div class="alert alert-dark" role="alert" style="background-color:slategray; color:white; font-weight: bold;">
                                <div class="row">
                                    <div class="col-8">
                                        Agregar Producto
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <i class="fa-solid fa-chevron-down" id="mostrarAgregarProductos" style="float:right; padding-top: 5px" onclick="showHideForm('mostrarFormProductos')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-right: 20px; display:block" id="mostrarFormProductos">
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
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
                                <div class="row">
                                    <div class="col-6 col-sm-6">
                                        <label>Nombre Producto:</label>
                                        <input class="form-control" id="nomProducto" name="nomProducto" type="text" readonly></input>
                                    </div>
                                    <div class="col-2 col-sm-2">
                                        <label>Cantidad:</label>
                                        <input class="form-control" id="cantProducto" name="cantProducto" type="text" maxlength="2"></input>
                                    </div>
                                    <div class="col-2 col-sm-2">
                                        <label>Precio:</label>
                                        <input class="form-control" id="precioProducto" name="precioProducto" type="text"></input>
                                    </div>
                                    <div class="col-2 col-sm-2" style="padding-top: 23px; padding-bottom: 20px">
                                        <button class=" btn btn-dark" id="addProduct" onclick="validarAgregarDatos('nomProducto','cantProducto', 'precioProducto', 'producto')">Agregar</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="agregarExtra" class="row" style="padding-left: 32px; padding-right: 32px;">
                            <div class="alert alert-dark" role="alert" style="background-color:slategray; color:white; font-weight: bold;">
                                <div class="row">
                                    <div class="col-8">
                                        Agregar Extra
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <i class="fa-solid fa-chevron-down" id="mostrarAgregarExtra" style="float:right; padding-top: 5px" onclick="showHideForm('mostrarFormExtra')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px; display: none" id="mostrarFormExtra">
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
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
                            </div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-6 col-sm-6">
                                    <label>Nombre Producto:</label>
                                    <input class="form-control" id="nomExtra" name="nomExtra" type="text" readonly></input>
                                </div>
                                <div class="col-2 col-sm-2">
                                    <label>Cantidad:</label>
                                    <input class="form-control" id="cantExtra" name="cantExtra" type="text" maxlength="2"></input>
                                </div>
                                <div class="col-2 col-sm-2">
                                    <label>Precio:</label>
                                    <input class="form-control" id="precioExtra" name="precioExtra" type="text"></input>
                                </div>
                                <div class="col-2 col-sm-2" style="padding-top: 23px; padding-bottom: 20px">
                                    <button class=" btn btn-dark" id="addExtra" onclick="validarAgregarDatos('nomExtra','cantExtra', 'precioExtra', 'extra')">Agregar</button></span>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <table class="table table-striped table-hover table-sm" id="tablaDetalle">
                                <thead>
                                    <th>#</th>
                                    <th>Codigo</th>
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
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px; padding-bottom:20px; float:right">
                            <div class="col-12 col-sm-12">
                                <label style="font-weight: bold; font-size: 30px; text-align:center;">Total Q.</label>
                                <input type="text" id="total" name="total" size="7" class="form" style="font-weight: bold; font-size: 30px; text-align:center;" readonly value="0.00">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row" style="padding-left: 20px; padding-right: 20px; padding-bottom:20px; float:right">
                    <div class="col-12 col-md-12">
                        <div class="text-center">
                            <button type="button" class="btn btn-info btn-lg" style="color:white" onclick="generarPedido();"><i class="fa-regular fa-floppy-disk"></i> Finalizar este pedido</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        var detPedido = [],
            datosEnvio = [],
            codigoPedido;
        $(document).ready(function() {
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
            $('#municipios').on('change', function() {
                datosEnvio = [];
                codigoMuni = $(this).val();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>obtenerZonasEnvio/" + codigoMuni,
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        var $select = $('#zonaEntrega');

                        // Limpiar el select (opcional)
                        $select.empty().append('<option value="">Selecciona una opción</option>');

                        // Agregar opciones al select basadas en la respuesta AJAX
                        $.each(response, function(index, item) {
                            datosEnvio.push(item);
                            $select.append($('<option>', {
                                value: item.env_id,
                                text: item.env_nombre
                            }));
                        });

                    }
                });
            });
            $('#costoEnvio').on('blur', function() {
                actualizarPrecio();
            });
            $('#zonaEntrega').on('change', function() {
                codigoZona = $(this).val();

                let indZona = datosEnvio.findIndex((zona) => zona.env_id === codigoZona);
                $('#costoEnvio').val(datosEnvio[indZona].env_precio);
                actualizarPrecio();
            });

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

            $('#producto').on('change', function() {
                codigoProducto = $(this).val();


                var Productos = <?php echo json_encode($productos); ?>;

                var indice = Productos.findIndex(function(producto) {
                    return producto.pr_id === codigoProducto;
                });

                codigo = Productos[indice]['pr_id'];
                nombre = Productos[indice]['pr_nombre'];
                precio = Productos[indice]['pr_precio_normal'];
                descripcion = Productos[indice]['pr_descripcion'];
                imagen = Productos[indice]['pr_imagen'];
                cantidad = 1;

                $('#nomProducto').val(nombre);
                $('#precioProducto').val(precio);
                $('#cantProducto').val(cantidad);


            });

            $('#extra').on('change', function() {
                codigoProducto = $(this).val();
                var Productos = <?php echo json_encode($extras); ?>;
                var indice = Productos.findIndex(function(producto) {
                    return producto.pr_id === codigoProducto;
                });
                codigo = Productos[indice]['pr_id'];
                nombre = Productos[indice]['pr_nombre'];
                precio = Productos[indice]['pr_precio_normal'];
                descripcion = Productos[indice]['pr_descripcion'];
                imagen = Productos[indice]['pr_imagen'];
                cantidad = 1;
                $('#nomExtra').val(nombre);
                $('#precioExtra').val(precio);
                $('#cantExtra').val(cantidad);
            });


            var nombre = $('#nombreProducto');
            var descripcion = $('#descripcionProducto');
            var nombreRecibe = $('#nomRecibe');
            var dirEntrega = $('#dirEntrega');
            var firma = $('#firma');
            var comprobante = $('#comprobante');
            var observaciones = $('#observaciones');
            procesarInput(nombre);
            procesarInput(descripcion);
            procesarInput(nombreRecibe);
            procesarCadena(dirEntrega);
            procesarCadena(firma);
            procesarCadena(comprobante);
            procesarCadena(observaciones);
            var puntoIngresado = false,
                puntoIngresado2 = false;

            $('#precioProducto, #precioExtra, #costoEnvio').on('input', function(e) {
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

            $('#cantProducto, #cantExtra, #telRecibe, #ordenPW').on('keypress', function(e) {
                // Obtener el código de la tecla presionada
                var charCode = (e.which) ? e.which : e.keyCode;
                // Verificar si la tecla presionada es un número (0-9)
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    // Si no es un número, prevenimos la entrada
                    e.preventDefault();
                }
            });

            $('#addProduct, #addExtra').on('click', function(e) {
                e.preventDefault();
            })



            $('#precio').on('input', function(e) {
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

            $('#precioNormal, #costoEnvio').on('input', function(e) {
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

        function showHideForm(idDiv) {
            var formulario = $("#" + idDiv);
            formulario.toggle("slow");
        }

        function validarAgregarDatos(nom, cant, prec, idSelect) {
            let nombreProducto = $('#' + nom).val(),
                cantidad = $('#' + cant).val(),
                precio = $('#' + prec).val();

            if (nombreProducto === "") {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Primero debes seleccionar un producto',
                })

            } else if (cantidad === "" || cantidad === '0' || precio === "" || precio === '0') {
                if (cantidad === "") {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debes ingresar la cantidad de compra',
                    })
                }
                if (cantidad === '0') {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La cantidad debe ser distinto de 0.',
                    })
                }
                if (precio === "") {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debes ingresar el precio',
                    })
                }
                if (precio === '0') {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El precio debe ser distinto de 0.',
                    })
                }
            } else {


                var codigoProducto = $('#' + idSelect).val();
                if (idSelect === "producto") {
                    var Productos = <?php echo json_encode($productos); ?>;
                    var texto = "Selecciona un producto";
                }
                if (idSelect === "extra") {
                    var Productos = <?php echo json_encode($extras); ?>;
                    var texto = "Selecciona un Extra";
                }

                var indice = Productos.findIndex(function(producto) {
                    return producto.pr_id === codigoProducto;
                });
                console.log(indice, codigoProducto);
                codigo = Productos[indice]['pr_id'];
                nombre = Productos[indice]['pr_nombre'];
                descripcion = Productos[indice]['pr_descripcion'];
                imagen = Productos[indice]['pr_imagen'];
                almacenarDetallePedido(codigo, imagen, nombre, descripcion, precio, cantidad);
                actualizarPrecio();
                $('#' + nom).val("");
                $('#' + cant).val("");
                $('#' + prec).val("");
                $("#" + idSelect).removeAttr("selected");

                // Agrega el atributo "selected" a la opción deseada
                $("#" + idSelect + " option[value='']").attr("selected", "selected");
                //$('#' + idSelect).val("");
                $('#tablaDetalle').DataTable().destroy();
                const tablaPedidos = $('#tablaDetalle').DataTable({
                    data: detPedido,
                    columns: [{
                            defaultContent: 'codigo'
                        }, {
                            data: 'codigo'
                        },
                        {
                            data: 'diseno',
                            render: function(data, type, row) {
                                // `data` contiene la ruta de la imagen
                                // `type` define el tipo de renderización (display, filter, etc.)
                                // `row` contiene el objeto completo

                                if (type === 'display') {
                                    return '<img src="' + data + '" alt="Imagen" width="125" height="125">';
                                }

                                // Para otros tipos de renderización, retorna data sin cambios
                                return data;
                            }
                        },
                        {
                            data: 'nombreProd'
                        },
                        {
                            data: 'descripProd'
                        },
                        {
                            data: 'precio'
                        },
                        {
                            data: 'cantidad'
                        },
                        {
                            data: 'subtotal'
                        },
                        {
                            defaultContent: '<a class="btn btn-danger btn-Eliminar" id="elimiarProducto"><i class="fa-solid fa-trash-can"></i></a>'
                        }
                    ],
                    responsive: true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    language: {
                        decimal: "",
                        emptyTable: "No hay datos.",
                        info: "Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
                        infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
                        infoFiltered: "(Fisltrados del total de _MAX_ registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Mostrar _MENU_ registros por página",
                        loadingRecords: "Cargando...",
                        processing: "Procesando...",
                        search: "Buscar:",
                        zeroRecords: "No hay datos.",
                        paginate: {
                            first: "Primera",
                            last: "Última",
                            next: "Siguiente",
                            previous: "Anterior"
                        },
                        aria: {
                            sortAscending: ": activate to sort column ascending",
                            sortDescending: ": activate to sort column descending"
                        }
                    },

                });
                $('#tablaDetalle').on('click', '.btn-Eliminar', function() {
                    const fila = $(this).closest('tr');
                    const data = tablaPedidos.row(fila).data();
                    if (data) {
                        const codigoProducto = data.codigo; // Asegúrate de que 'codigo' sea el nombre correcto de la columna en tus datos
                        console.log(codigoProducto);
                        // Buscar el índice del producto en el arreglo de objetos
                        const indiceProducto = detPedido.findIndex((producto) => producto.codigo === codigoProducto);
                        console.log(indiceProducto);
                        if (indiceProducto !== -1) {
                            // Eliminar el producto del arreglo
                            detPedido.splice(indiceProducto, 1);
                            actualizarPrecio();
                            // Eliminar la fila en DataTable y en la tabla HTML
                            fila.remove();

                            console.log('Producto eliminado:', codigoProducto);
                        }
                    }
                });
            }
        }

        function almacenarDetallePedido(codigo, diseno, nombreProd, descripProd, precio, cantidad) {


            const indiceProd = detPedido.findIndex((producto) => producto.codigo === codigo);
            console.log(indiceProd);

            if (indiceProd == -1) {
                var subtotal = precio * cantidad;

                // Crea un nuevo objeto con los datos proporcionados
                var Objeto = {
                    codigo: codigo,
                    diseno: diseno,
                    nombreProd: nombreProd,
                    descripProd: descripProd,
                    precio: precio,
                    cantidad: cantidad,
                    subtotal: subtotal
                };

                // // Agrega el nuevo objeto al arreglo
                detPedido.push(Objeto);
            } else {
                var cantAnterior = detPedido[indiceProd].cantidad;
                var cantNueva = parseInt(cantAnterior) + parseInt(cantidad);

                var precioAnt = detPedido[indiceProd].precio
                var nuevoSubTotal = cantNueva * precioAnt;

                detPedido[indiceProd].cantidad = cantNueva;
                detPedido[indiceProd].subtotal = nuevoSubTotal;
            }

        }

        // Función para sumar los subtotales
        function obtenerTotal(arreglo) {
            var suma = 0;
            for (var i = 0; i < arreglo.length; i++) {
                suma += arreglo[i].subtotal;
            }
            return suma;
        }

        function actualizarPrecio() {
            var envio = parseInt($('#costoEnvio').val());
            var total = parseFloat(obtenerTotal(detPedido)) + parseFloat(envio);
            $('#total').val(total.toFixed(2));
        }

        function generarPedido() {
            if ($('#nomRecibe').val() === '' || $('#fechaEntrega').val() === '' || $('#telRecibe').val() === '' || $('#zonaEntrega').val() === '' || $('#dirEntrega').val() === '' ||
                $('#firma').val() === '' || $('#costoEnvio').val() === '' || $('#leyendatarjeta').val() === '' || $('#formaPago').val() === '' || $('#fabrica').val() === '' || $('#costoEnvio').val() === '0') {

                if ($('#nomRecibe').val() === '') {
                    mostrarError($('#nomRecibe').prop("id"));
                }
                if ($('#fechaEntrega').val() === '') {
                    mostrarError($('#fechaEntrega').prop("id"));
                }
                if ($('#telRecibe').val() === '') {
                    mostrarError($('#telRecibe').prop("id"));
                }
                if ($('#zonaEntrega').val() === '') {
                    mostrarError($('#zonaEntrega').prop("id"));
                }
                if ($('#dirEntrega').val() === '') {
                    mostrarError($('#dirEntrega').prop("id"));
                }
                if ($('#firma').val() === '') {
                    mostrarError($('#firma').prop("id"));
                }
                if ($('#costoEnvio').val() === '') {
                    mostrarError($('#costoEnvio').prop("id"));
                }
                if ($('costoEnvio').val() === '0') {
                    mostrarError($('#costoEnvio').prop("id"));
                }
                if ($('#leyendatarjeta').val() === '') {
                    mostrarError($('#leyendatarjeta').prop("id"));
                }
                if ($('#formaPago').val() === '') {
                    mostrarError($('#formaPago').prop("id"));
                }
                if ($('#fabrica').val() === '') {
                    mostrarError($('#fabrica').prop("id"));
                }

            } else if ($('#codigoCliente').val() === '' || detPedido.length === 0) {

                if ($('#codigoCliente').val() === '') {
                    swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Al parecer el codigo del cliente no existe, vuelve a intentarlo. ',
                    })
                }
                if (detPedido.length === 0) {
                    swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Debes agregar productos',
                    })
                }
            } else {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Realmente deseas guardar este pedido",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var encabezado = $("#formularioPedido").serialize();
                        var detallePedido = JSON.stringify(detPedido);
                        console.log(detallePedido);
                        console.log(encabezado);
                        $.ajax({
                            async: false,
                            type: "post",
                            url: "<?php echo base_url() ?>generarPedido",
                            data: {
                                encabezado: encabezado,
                                detallePedido: detallePedido
                            },
                            dataType: "html",
                            success: function(response) {
                                if (response != 'falso') {
                                    // La respuesta es igual a true
                                    $("#tablaDetalle tbody").empty();
                                    $("#formularioPedido")[0].reset();
                                    $("#contenedor").attr("style", "display:none");
                                    detPedido = [];
                                    codigoPedido = response.trim();
                                    Swal.fire({
                                        title: 'Pedido Registrado',
                                        icon: 'info',
                                        html: 'El pedido se ha guardado con éxito.<br>' +
                                            '<a href="//sweetalert2.github.io" target="_blank" class="btn btn-primary btn-lg">Tarjeta</a> ' +
                                            '<a href="//sweetalert2.github.io" target="_blank" class="btn btn-info btn-lg" >Envio</a> ' +
                                            '<a href="<?php echo base_url() ?>pedidosPendientes" class="btn btn-success btn-lg" >Ver Pedidos</a> ',
                                        showConfirmButton: false,
                                        allowOutsideClick: false, // Evitar el cierre al hacer clic afuera
                                        allowEscapeKey: false, // Evitar el cierre al presionar Esc

                                    })
                                } else {
                                    // La respuesta no es true
                                    console.log('La respuesta no es verdadera (true).');
                                }
                            }
                        });
                    }
                })
            }
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

        function mostrarError(nombreCampo) {
            swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'El campo ' + nombreCampo + ' no puede estar vacío',
            });
            $('#' + nombreCampo).focus();
        }
    </script>