<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<div class="content-wrapper">
    <h1>Panel</h1>
    <!-- Oferta Educativa Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Licenciaturas</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/image/licenciaturas.png" alt="">
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>licenciatura">
                                Agrear Licenciatura
                                <div class="d-inline-flex btn-sm-square bg-success text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Maestrías</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/image/maestrias.png" alt="">
                        </div>
                        <div class=" card-footer">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>maestria">
                                Agrear Maestría
                                <div class="d-inline-flex btn-sm-square bg-success text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Educación Continua</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/image/educacion.png" alt="">
                        </div>
                        <div class=" card-footer">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>continua">
                                Agrear Programa
                                <div class="d-inline-flex btn-sm-square bg-success text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Blog</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/image/administracion.png" alt="">
                        </div>
                        <div class=" card-footer">
                            <a class="btn btn-block btn-outline-success px-3" href="<?php echo constant('URL') ?>blog">
                                Agrear Artículo
                                <div class="d-inline-flex btn-sm-square bg-success text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Oferta Educativa End -->
</div>

<?php require 'views/templete/footer.php'; ?>