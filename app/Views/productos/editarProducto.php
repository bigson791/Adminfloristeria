<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
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
                                <input class="form-control" id="codPagina" name="codPagina" type="text" autofocus require>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label>Nombre del producto:</label>
                                <input class="form-control" id="nombreProducto" name="nombreProducto" type="text" autofocus require>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-md-12 col-sm-6">
                                <label>Descripción:</label>
                                <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" type="textarea" rows="2" require></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Precio Normal:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="precioNormal">Q.</span>
                                    </div>
                                    <input type="text" class="form-control" require id="precioNormal" name="precioNormal">
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <label>precio Rebajado:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="precioReba">Q.</span>
                                    </div>
                                    <input type="text" class="form-control" require id="precioRebajado" name="precioRebajado">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-md-12 col-sm-6">
                                <label>URL de la imagen:</label>
                                <input class="form-control" id="urlImgProd" name="urlImgProd" type="text" require>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                            <div class="col-12 col-sm-6">
                                <label>Empresa:</label>
                                <input class="form-control" id="empresa" name="empresa" type="text" require value="1" readonly>
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
            })
        })
    </script>