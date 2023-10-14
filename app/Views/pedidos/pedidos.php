<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php

                                use App\Controllers\Clientes;

                                echo $titulo ?></h3>
            <div>
                <p>
                    <a href="<?php echo base_url() ?>NuevoCliente" class="btn btn-info"> <i class="fa-solid fa-user-plus"></i> Agregar Cliente</a>
                    <a href="<?php echo base_url() ?>ClientesEliminados" class="btn btn-danger"> <i class="fa-regular fa-eye"></i> Ver Eliminados</a>
                </p>
            </div>
            <div class="card mb-4">
                <div class="table table-responsive"="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                    <table class="table-sm display dataTable dtr-inline collapsed" id="tablaClientes" style="width: 100%;">
                        <thead>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Nit</th>
                            <th>Telefono</th>
                            <th>Última Compra</th>
                            <th>Correo</th>
                            <th>Cant. Pedidos</th>
                            <th>País</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($Clientes as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['cl_nombres']; ?></td>
                                    <td><?php echo $dato['cl_apellidos']; ?></td>
                                    <td><?php echo $dato['cl_nit']; ?></td>
                                    <td><?php echo $dato['cl_telefono']; ?></td>
                                    <td><?php echo $dato['cl_fecha_up']; ?></td>
                                    <td><?php echo $dato['cl_correo']; ?></td>
                                    <td><?php echo $dato['cl_pedidos']; ?></td>
                                    <td><?php echo $dato['cl_pais']; ?></td>
                                    <td><a href="<?php echo base_url() . 'EditarCliente/' . $dato['cl_id'] ?>" class="btn btn-warning " title="Editar Cliente"> <i class="fa-solid fa-pen"></i></a></td>
                                    <td><a id="eliminarCliente" href="#" data-href="<?php echo base_url() . 'eliminarCliente/' . $dato['cl_id'] ?>" class="btn btn-danger btn-EliminarCliente" title="Eliminar Cliente"><i class="fa-solid fa-trash"></i></a></td>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4e4d4d; color:white;">
                    <div class="text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                    </div>
                    <a id="btnCerrarModal" type="button" class="close btnCerrarModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white"><i class="fa-solid fa-xmark"></i></span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa-solid fa-trash" style="font-size: 50px"></i>
                        <P style="font-size: 18px;">¿Estas seguro que quieres eliminar el registro?</P>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="button" class="btn btn-secondary btnCerrarModal" style="float: left" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a type="button" class="btn btn-danger btn-ok" style="float: right">Eliminar</a>
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
            $('#tablaClientes').on('click', '.btn-EliminarCliente', function() {
                urlToDelete = $(this).data('href');
                $('#modalConfirmacionCliente').modal('show');
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