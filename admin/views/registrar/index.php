<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

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
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b class="h1">Registrar</b>
            </div>
            <div class="card-body">
                <form action="#" method="post" id="formUser">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-primary" placeholder="Nombre completo" id="nameFull" name="nameFull">
                        <div class="input-group-append">
                            <div class="input-group-text border-primary" id="iconoInput">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control border-primary" placeholder="Correo electronico" id="email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text border-primary">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border-primary" placeholder="Password" id="pass" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text border-primary">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border-primary" placeholder="Repite password" id="pass2" name="pass2">
                        <div class="input-group-append">
                            <div class="input-group-text border-primary">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" onsubmit="return validar()">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- libreria de axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo constant('URL') ?>assets/js/formUsers.js"></script>
    <!-- jQuery -->
    <script src="<?php echo constant('URL') ?>libs/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL') ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL') ?>libs/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo constant('URL') ?>libs/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo constant('URL') ?>libs/plugins/toastr/toastr.min.js"></script>
</body>

</html>