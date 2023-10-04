
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $titulo?></h3>
                        <div>
                            <p>
                            <a class="btn btn-primary" style="color: white;" href="<?php echo base_url()?>clientes" > <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            </p>
                        </div>
                        <div class="card mb-4">
                            <div class="table-responsive" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                                <table class="table-sm table-bordered table-hover" id="tablaClientes">
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
                                                <td><a href="<?php echo base_url().'reingresarCliente/'. $dato['cl_id']?>" class="btn btn-primary" title="Regresar Registro"> <i class="fa-solid fa-turn-up"></i></a></td>
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
    $('#tablaClientes').DataTable();
});
</script>
