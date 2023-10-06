
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $titulo?></h3> 
                        <div class="card mb-4">
                            <img src='https://floristeriasguate.com/wp-content/uploads/2019/09/Jardinera-pequena.jpg' width="300px" height="300px">
                            <form method="post" action="<?php echo base_url();?>insertarCliente" autocomplete="off">
                                <div class="form-group">
                                    <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                                        <div class="col-12 col-sm-6" >
                                            <label>Nombres del producto:</label>
                                            <input class="form-control" id="nombreProducto" name="nombreProducto" type="text" autofocus require>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                        <label>Descripción:</label>
                                            <input class="form-control" id="descripcionProducto" name="descripcionProducto" type="text-area" require>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                                        <div class="col-12 col-sm-6">
                                            <label>Telefono:</label>
                                            <input class="form-control" id="telefono" name="telefono" type="tel"  require>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                        <label>NIT:</label>
                                            <input class="form-control" id="nit" name="nit" type="text">
                                        </div>
                                    </div>
                                    <div class="row"  style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                                        <div class="col-12 col-sm-6">
                                            <label>Correo:</label>
                                            <input class="form-control" id="correo" name="correo" type="email"  require>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                        <label>Pais:</label>
                                            <input class="form-control" id="pais" name="pais" type="text">
                                        </div>
                                    </div>
                                    <div class="row"  style="padding-left: 20px; padding-top: 20px; padding-right: 20px;">
                                        <div class="col-12 col-sm-6">
                                            <label>Empresa:</label>
                                            <input class="form-control" id="empresa" name="empresa" type="text"  require value="1" readonly>
                                        </div>
                                    </div>
                                    <div class="text-center" style="padding-top: 20px;">
                                    <a class="btn btn-primary" style="color: white;" href="<?php echo base_url()?>clientes" > <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                                    <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </main>

<script>

</script>
