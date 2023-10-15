<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h3 class="mt-4"><?php echo $titulo ?></h3>
      <div>
        <p>
          <a href="<?php echo base_url() ?>NuevoProducto" class="btn btn-info"> <i class="fa-solid fa-box"></i> Agregar Producto</a>
          <a href="<?php echo base_url() ?>ProductosEliminados" class="btn btn-danger"> <i class="fa-regular fa-eye"></i> Ver Eliminados</a>
        </p>
      </div>
      <div class="card mb-4">
        <div class="table-responsive" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
          <table class="display dataTable dtr-inline collapsed" id="tablaProductos" style="width: 100%; position: relative;">
            <thead>
              <th>Código Pagina</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio Normal</th>
              <th>Precio Rebajado</th>
              <th>Diseño</th>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <?php foreach ($productos as $dato) { ?>
                <tr>
                  <td><?php echo $dato['pr_cod_pagina']; ?></td>
                  <td><?php echo $dato['pr_nombre']; ?></td>
                  <td><?php echo $dato['pr_descripcion']; ?></td>
                  <td><?php echo number_format($dato['pr_precio_normal'],2,'.',''); ?></td>
                  <td><?php echo number_format($dato['pr_precio_rebajado'],2,'.',''); ?></td>
                  <td><img src="<?php echo $dato['pr_imagen']; ?>" heigh="150px;" width="150px;"></td>
                  <td><a href="<?php echo base_url() . 'EditarProducto/' . $dato['pr_id'] ?>" class="btn btn-warning" title="Editar Cliente"> <i class="fa-solid fa-pen"></i></a></td>
                  <td><a href="#" data-href="<?php echo base_url() . 'eliminarProducto/' . $dato['pr_id'] ?>" data-toggle="modal" data-target="#modalConfirmacionCliente" rel="tooltip" data-placement="top" class="btn btn-danger btn-EliminarCliente" title="Eliminar Cliente"> <i class="fa-solid fa-trash"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <div class="modal fade" id="modalConfirmacionCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #4e4d4d; color:white;">
          <div class="text-center">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
          </div>
          <a type="button" class="close btnCerrarModal" data-dismiss="modal" aria-label="Close">
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
      $('#tablaProductos').DataTable({
        responsive: true,
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        columnDefs: [{
            width: "10px",
            targets: 0
          },
          {
            width: "100px",
            targets: 1
          },
          {
            width: "500px",
            targets: 2
          },
          {
            width: "70px",
            targets: 3
          },
          {
            width: "70px",
            targets: 4
          },
          {
            width: "70px",
            targets: 5
          },
          {
            width: "70px",
            targets: 6
          },
          {
            width: "70px",
            targets: 7
          }
        ],
        language: {
          decimal: "",
          emptyTable: "No hay datos.",
          info: "Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
          infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
          infoFiltered: "(Filtrados del total de _MAX_ registros)",
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

      $('#tablaProductos').on('click', '.btn-EliminarCliente', function() {
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