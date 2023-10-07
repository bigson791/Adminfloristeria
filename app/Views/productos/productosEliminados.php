<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h3 class="mt-4"><?php echo $titulo ?></h3>
      <div>
        <p>
          <a class="btn btn-primary" style="color: white;" href="<?php echo base_url() ?>productos"> <i class="fa-solid fa-rotate-left"></i> Regresar</a>
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
            </thead>
            <tbody>
              <?php foreach ($productos as $dato) { ?>
                <tr>
                  <td><?php echo $dato['pr_cod_pagina']; ?></td>
                  <td><?php echo $dato['pr_nombre']; ?></td>
                  <td><?php echo $dato['pr_descripcion']; ?></td>
                  <td><?php echo $dato['pr_precio_normal']; ?></td>
                  <td><?php echo $dato['pr_precio_rebajado']; ?></td>
                  <td><img src="<?php echo $dato['pr_imagen']; ?>" heigh="150px;" width="150px;"></td>
                  <td><a href="<?php echo base_url() . 'reingresarProducto/' . $dato['pr_id'] ?>" class="btn btn-primary" title="Regresar Registro"> <i class="fa-solid fa-turn-up"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <script>
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

    });
  </script>