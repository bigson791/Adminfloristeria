<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php

                                use App\Controllers\Clientes;

                                echo $titulo ?></h3>

            <div class="card mb-4">
                <div class="table table-responsive"="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                    <table class="table-sm display dataTable dtr-inline collapsed" id="tablaClientes" style="width: 100%;">
                        <thead>
                            <th># Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha Pedido</th>
                            <th>Nombre Recibe</th>
                            <th>Fecha Entrega</th>
                            <th>Telefono Recibe</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Zona</th>
                            <th>Dirección</th>
                            <th>Texto para Tarjeta</th>
                            <th>Observaciones</th>
                            <th>Forma Pago</th>
                            <th>Comprobante</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['pe_id']; ?></td>
                                    <td><?php echo $dato['pe_cl_id']; ?></td>
                                    <td><?php echo $dato['pe_fecha_pedido']; ?></td>
                                    <td><?php echo $dato['pe_nom_recibe']; ?></td>
                                    <td><?php echo $dato['pe_fecha_entrega']; ?></td>
                                    <td><?php echo $dato['pe_tel_entrega']; ?></td>
                                    <td><?php echo $dato['pe_id_dep_entrega']; ?></td>
                                    <td><?php echo $dato['pe_id_mun_entrega']; ?></td>
                                    <td><?php echo $dato['pe_zona_entrega']; ?></td>
                                    <td><?php echo $dato['pe_dir_entrega']; ?></td>
                                    <td><?php echo $dato['pe_text_tarjeta']; ?></td>
                                    <td><?php echo $dato['pe_observaciones']; ?></td>
                                    <td><?php echo $dato['pe_forma_pago']; ?></td>
                                    <td><?php echo $dato['pe_comprobante_pago']; ?></td>
                                    <td><a class="btn btn-info  btn-VerDetalles" title="Ver Detalles" style="color:white"> <i class="fa-regular fa-eye"></i></a></td>
                                    <td><a class="btn btn-dark" title="Imprimir Envio"><i class="fa-solid fa-truck-arrow-right"></i></a></td>
                                    <td><a class="btn btn-secondary " title="Imprimir Tarjeta"> <i class="fa-regular fa-envelope-open"></i></a></td>
                                    <td><a class="btn btn-primary" title="Editar Pedido"><i class="fa-solid fa-pen"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modalConfirmacionCliente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4e4d4d; color:white;">
                    <div class="text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Detalle del pedido</h5>
                    </div>
                    <a id="btnCerrarModal" type="button" class="close btnCerrarModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white"><i class="fa-solid fa-xmark"></i></span>
                    </a>
                </div>
                <div class="modal-body">
                    <table class="table table-over">
                        <thead>
                            <th>Imagen</th>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="button" class="btn btn-secondary btnCerrarModal" style="float: left" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a type="button" class="btn btn-info btn-ok" style="float: right; color: white">Terminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var urlToDelete;
        $(document).ready(function() {
            var tablaClientes = $('#tablaClientes').DataTable({
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
            $('#tablaClientes').on('click', '.btn-VerDetalles', function() {
                urlToDelete = $(this).data('href');
                $('#modalConfirmacionCliente').modal('show');
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>verDetallePedido/" + 25,
                    data: "data",
                    dataType: "json",
                    success: function(response) {

                    }
                });
            })

            $('.btnCerrarModal').on('click', function() {
                $('#modalConfirmacionCliente').modal('hide');
                console.log("He presionado el boton");
            })

            $('#modalConfirmacionCliente').on('click', '.btn-ok', function() {
                // Realiza la acción deseada, en este caso, redirige a la URL almacenada
                if (urlToDelete) {
                    window.location.href = urlToDelete;
                }
            });
        });
    </script>