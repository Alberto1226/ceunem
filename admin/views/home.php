<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition register-page">
<script type="text/javascript">
        var APP_URL = '<?php echo constant('URL'); ?>';
        APP_URL = APP_URL.replace(/\/admin\/?$/, '');
        console.log(APP_URL);
        console.log("--->",APP_URL);
    </script>
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b class="h1">Iniciar Sesión</b>
            </div>
            <div class="card-body">
                <form action="#" method="post" id="formLogin">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo electronico" name="email" id="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" onsubmit="return validarLogin()">Iniciar Sesión</button>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <a class="text-center mt-2" href="<?php echo constant('URL') ?>registrar">Registrar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- libreria de axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo constant('URL') ?>assets/js/formLogin.js"></script>
    <!-- jQuery -->
    <script src="<?php echo constant('URL') ?>libs/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL') ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL') ?>libs/dist/js/adminlte.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo constant('URL') ?>libs/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo constant('URL') ?>libs/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo constant('URL') ?>libs/plugins/toastr/toastr.min.js"></script>
</body>

</html>