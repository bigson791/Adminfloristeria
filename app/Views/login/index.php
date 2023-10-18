<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Floristeria Admin</title>
    <link href="<?php echo base_url() ?>css/styles.css" rel="stylesheet"><!-- Hoja de estilos tema-->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/style.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>js/all.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-3.7.1.min.js"></script>
</head>

<body style="background-color: #f9f9f9">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="padding-top: 125px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark">
                                    <h3 class="text-center font-weight-light my-4" style="color: white;">Floristeria Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form style="padding-top: 45px; padding-left: 25px;padding-right: 25px; padding-bottom: 45px;" method="post" action="<?php base_url(); ?>iniciarSesion">
                                        <?php if (isset($validation)) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $validation->listErrors(); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($error)) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Ingresa tu usuario" />
                                            <label for="inputEmail">Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="passwrd" name="passwrd" type="password" placeholder="Ingresa tu contraseña" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-dark btn-xl" value="Ingresar">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <p>Floristeria Admin <?php echo date("Y") ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; A Y F Design <?php echo date("Y") ?></div>
                        <div>
                            <a href="mailto:soporte@ayfserviciostecnologicos.com">Soporte</a>
                            &middot;
                            <a href="https://ayfserviciostecnologicos.com/" target="_blank">Quiero un sistema como este</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url() ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/scripts.js"></script>
</body>

</html>