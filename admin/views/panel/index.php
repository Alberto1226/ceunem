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
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/dist/css/adminlte.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>libs/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <nav class="navbar navbar-expand navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
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

    <h1 class="text-center mt-2">Panel</h1>
    <!-- Oferta Educativa Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Inicio</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider1">
                                Imágen Slider 1
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider2">
                                Imágen Slider 2
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider3">
                                Imágen Slider 3
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nosotros</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider1Nosotros">
                                Imágen Slider 1
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>programaCalidad">
                                Programa de Calidad
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>mision">
                                Misión
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>vision">
                                Visión
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>objetivo">
                                Objetivos
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>Valor">
                                Valores
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>equipo">
                                Equipo de trabajo
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Oferta Educativa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider1OfEducativa">
                                Imágen Slider 1
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>oferta">
                                Descripción
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>licenciatura">
                                Licenciaturas
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>maestria">
                                Maestrías
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>continua">
                                Educación Continua
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Blog</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider1Blog">
                                Imágen Slider 1
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>blog">
                                Agrear Artículo
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Contacto</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>slider1Contacto">
                                Imágen Slider 1
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>contacto">
                                Formulario de contacto
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>telefono">
                                Configuración WhatsApp
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>mapa">
                                Configuración del GPS
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Configuración General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>colores">
                                Paleta de colores
                            </a>
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>servidor">
                                Servidor de correos
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Testimonios</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>testimonios">
                                Agrear Testimonios
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- libreria de axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo constant('URL') ?>libs/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL') ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL') ?>libs/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo constant('URL') ?>libs/dist/js/demo.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo constant('URL') ?>libs/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

</body>

</html>