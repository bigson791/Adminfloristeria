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
                                    <input class="form-control" id="codPagina" name="codigoPersona" type="text" value="<?php echo $cliente['cl_id']; ?>" hidden>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <label>Fecha del Pedido</label>
                                    <input class="form-control" id="fechaPedido" name="fechaPedido" type="text" value="<?php echo date('Y-m-d') ?>" readonly>
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
                                    <input class="form-control" id="nomRecibe" name="nomRecibe" type="text"></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Fecha Entrega:</label>
                                    <input class="form-control" id="fechaEntrega" name="fechaEntrega" type="date"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Telefono Recibe:</label>
                                    <input class="form-control" id="telRecibe" name="telRecibe" type="tel"></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Departamento Entrega:</label>
                                    <input class="form-control" id="depEntrega" name="depEntrega" type="text"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Municipio Entrega:</label>
                                    <input class="form-control" id="munEntrega" name="munEntrega" type="text"></input>
                                </div>
                                <div class="col-6 col-md-6 col-sm-6">
                                    <label>Zona Entrega:</label>
                                    <input class="form-control" id="zonaEntrega" name="zonaEntrega" type="text"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12">
                                    <label>Dirección Entrega:</label>
                                    <input class="form-control" id="dirEntrega" name="dirEntrega" type="text"></input>
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
                                <button type="button" class="btn btn-info">Finalizar</button>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="text-center row" style="padding-top: 20px;">
                                <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>productos"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                                <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        var detPedido = [];
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
            procesarInput(nombre);
            procesarInput(descripcion);
            var puntoIngresado = false,
                puntoIngresado2 = false;

            $('#precioProducto, #precioExtra').on('input', function(e) {
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

            $('#cantProducto, #cantExtra').on('keypress', function(e) {
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
                var total = obtenerTotal(detPedido).toFixed(2);
                $('#total').val(total);
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
                    console.log(fila);
                    console.log(data);
                    if (data) {
                        const codigoProducto = data.codigo; // Asegúrate de que 'codigo' sea el nombre correcto de la columna en tus datos
                        console.log(codigoProducto);
                        // Buscar el índice del producto en el arreglo de objetos
                        const indiceProducto = detPedido.findIndex((producto) => producto.codigo === codigoProducto);
                        console.log(indiceProducto);
                        if (indiceProducto !== -1) {
                            // Eliminar el producto del arreglo
                            detPedido.splice(indiceProducto, 1);

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
    </script>