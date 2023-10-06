
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $titulo?></h3>
                        <div>
                            <p>
                                <a href="<?php echo base_url()?>NuevoCliente" class="btn btn-info"> <i class="fa-solid fa-user-plus"></i> Agregar Cliente</a>
                                <a href="<?php echo base_url()?>ClientesEliminados" class="btn btn-danger"> <i class="fa-regular fa-eye"></i> Ver Eliminados</a>
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
                                        <?php foreach($Clientes as $dato){?>
                                            <tr>
                                                <td><?php echo $dato['cl_nombres'];?></td>
                                                <td><?php echo $dato['cl_apellidos'];?></td>
                                                <td><?php echo $dato['cl_nit'];?></td>
                                                <td><?php echo $dato['cl_telefono'];?></td>
                                                <td><?php echo $dato['cl_fecha_up'];?></td>
                                                <td><?php echo $dato['cl_correo'];?></td>
                                                <td><?php echo $dato['cl_pedidos'];?></td>
                                                <td><?php echo $dato['cl_pais'];?></td>
                                                <td><a href="<?php echo base_url().'EditarCliente/'. $dato['cl_id']?>" class="btn btn-warning" title="Editar Cliente"> <i class="fa-solid fa-pen"></i></a></td>
                                                <td><a href="<?php echo base_url().'eliminarCliente/'. $dato['cl_id']?>" class="btn btn-danger" title="Eliminar Cliente" > <i class="fa-solid fa-trash"></i></a></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<script>
$(document).ready(function() {
   var tablaClientes = $('#tablaClientes').DataTable({
    responsive: true
   });
});
</script>
