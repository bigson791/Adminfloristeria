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
        <div class="row" style="padding-top: 25px; padding-left: 25px; padding-right: 25px;">
          <div class="card">
            <div class="text-center">
              <img id="imgProducto" src='' width="250px" height="250px">
            </div>
          </div>
        </div>
        <form method="post" action="<?php echo base_url(); ?>insertarProducto" autocomplete="off">
          <div class="form-group">
            <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
              <div class="col-lg-6 col-sm-6">
                <label>Código página web:</label>
                <input class="form-control" id="codPagina" name="codPagina" type="text" autofocus value="<?php echo set_value('codPagina'); ?>">
              </div>
              <div class="col-lg-6 col-sm-6">
                <label>Nombre del producto:</label>
                <input class="form-control" id="nombreProducto" name="nombreProducto" type="text" autofocus required value="<?php echo set_value('nombreProducto'); ?>">
              </div>
            </div>
            <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
              <div class="col-12 col-md-12 col-sm-6">
                <label>Descripción:</label>
                <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" type="textarea" rows="2" required value="<?php echo set_value('descripcionProducto'); ?>"></textarea>
              </div>
            </div>
            <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
              <div class="col-12 col-sm-6">
                <label>Precio Normal:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="precioN">Q.</span>
                  </div>
                  <input type="text" class="form-control" required id="precioNormal" name="precioNormal" value="<?php echo set_value('precioNormal'); ?>">
                </div>

              </div>
              <div class="col-12 col-sm-6">
                <label>precio Rebajado:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="precioReba">Q.</span>
                  </div>
                  <input type="text" class="form-control" id="precioRebajado" name="precioRebajado" value="<?php echo set_value('precioRebajado'); ?>">
                </div>
              </div>
            </div>
            <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
              <div class="col-12 col-md-12 col-sm-6">
                <label>URL de la imagen:</label>
                <input class="form-control" id="urlImgProd" name="urlImgProd" type="text" required value="<?php echo set_value('urlImgProd'); ?>">
              </div>
            </div>
            <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
              <div class="col-12 col-sm-6">
                <label>Empresa:</label>
                <input class="form-control" id="empresa" name="empresa" type="text" required value="1" readonly>
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

    });

    function procesarInput(input) {
      input.on('input', function() {
        var texto = input.val();
        var textoLimpio = '';

        // Recorrer cada carácter en el texto de entrada
        for (var i = 0; i < texto.length; i++) {
          var caracter = texto[i];

          // Verificar si el carácter es una letra (no es un número) o un espacio en blanco
          if (caracter.match(/[a-zA-Z\s0-9]/)) {
            textoLimpio += caracter.toUpperCase();
          }
        }

        // Establecer el valor del campo de entrada como el texto modificado
        input.val(textoLimpio);
      });
    }
  </script>