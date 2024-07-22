<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEUNEM</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/toastr/toastr.min.css">
    
</head>

<body class="hold-transition sidebar-mini">
<script type="text/javascript">
        const APP_URL = '<?php echo constant('URL'); ?>';
        console.log(APP_URL);
    </script>
    <!-- Site wrapper -->
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo constant('URL') ?>assets/image/favicon.ico" class="user-image">
                    </a>
                    <ul class="dropdown-menu">
                    <a class="btn" href="<?php echo constant('URL') ?>logout"><i class="fas fa-sign-out-alt fa-fw"></i>
                            Cerrar sesión</a>
                    </ul>
                </li>
            </ul>
        </nav>