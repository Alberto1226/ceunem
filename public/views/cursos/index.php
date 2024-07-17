<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bannerImgAsc" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Capacitación Emperesarial</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?php echo constant('URL') ?>home">Inicio</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Capacitación Emperesarial</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- cursos Start -->
<div class="container-xxl py-5">
<div class="d-inline-block rounded-pill restPagina text-white py-1 px-3 mb-3">Capacitación Emperesarial</div>
            <h3 class="display-8 mb-5"><?= $this->header->descripcion; ?></h3>
    <div class="container">
        <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill restPagina text-white py-1 px-3 mb-3">Capacitación Emperesarial</div>
            <h1 class="display-6 mb-5"><?= $this->header->descripcion; ?></h1>
        </div>-->
        <div class="row g-4 justify-content-center">
            <?php
            include_once 'models/clases/cursos.php';
            if (isset($this->fila)) {
            ?>
                <div class="col-lg-6">
                    <h1 class="display-1">Proximamente</h1>
                    <p class="mb-4 text-light">Todavía estamos trabajando arduamente para que la magia suceda (no puedes apurar la perfección), así que deberás esperar un poco más. Asegúrate de suscribirte a las últimas actualizaciones y estar al tanto de cuando tengamos nuevas carreras, maestrías y cursos para tí.</p>
                    <a class="btn btn-outline-primary py-2 px-3 btnPag" href="<?php echo constant('URL') ?>contacto">
                        Suscríbete
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
                <?php
            } else {
                foreach ($this->cursos as $row) {
                    $cursos = new cursos();
                    $cursos = $row;
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                            <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $cursos->img_url; ?>" alt="<?php echo $cursos->nom_curso; ?>">
                            <h4 class="mb-3" style="color:#A5042D;"><?php echo $cursos->nom_curso; ?></h4>
                            <p class="mb-4"><?php echo $cursos->descripcion; ?></p>
                            <a class="btn btn-outline-primary px-3 btnPag" href="<?php echo constant('URL') ?>moreinfCU?desc_detallada=<?php echo urlencode($cursos->desc_detallada); ?>&revoe=<?php echo urlencode($cursos->revoe); ?>&id_curso=<?php echo urlencode($cursos->id_curso); ?>&name_curso=<?php echo urlencode($cursos->nom_curso); ?>&pdf=<?php echo urlencode($cursos->pdf_url); ?>&img=<?php echo urlencode($cursos->img_url); ?>" target="_blank">
                                Ver más
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<!-- cursos End -->
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php';?>
<script src="<?php echo constant('URL') ?>assets/js/licenciatura.js"></script>