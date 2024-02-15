<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<?php

$desc_detallada = $_GET['desc_detallada'];
$revoe = $_GET['revoe'];
$id_ec = $_GET['id_ec'];
$name = $_GET['name_ec'];
$pdf = $_GET['pdf'];

?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bannerImgAsc" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4"> </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <h1 class="text-white">
                        <?php echo $name; ?>
                    </h1>
                </li>
            </ol>
            <div class="d-inline-block ">

                <a href="<?php echo constant('ARCHIVOS') . $pdf; ?>" class="btn btn-primary btn-sm float-right"
                    target="_blank">
                    <i class="far fa-file-pdf"></i> Plan de Estudio
                </a>
            </div>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="d-inline-block mb-3">
        <div class="d-inline-block rounded-pill restPagina text-white py-1 px-3 mb-3">
            <?php echo $revoe; ?>
        </div>
    </div>
    <h5 class=" mb-5 text-justify">
        <?php echo $desc_detallada; ?>
    </h5>
    <div class="container">

        <div class="row g-4 justify-content-center">
            <?php
            include_once 'models/clases/maestrias.php';
            if (isset($this->fila)) {
                ?>
                <div class="col-lg-6">
                    <h1 class="display-1">Proximamente</h1>
                    <p class="mb-4 text-light">Todavía estamos trabajando arduamente para que la magia suceda (no puedes
                        apurar la perfección), así que deberás esperar un poco más. Asegúrate de suscribirte a las últimas
                        actualizaciones y estar al tanto de cuando tengamos nuevas carreras, maestrías y cursos para tí.</p>
                    <a class="btn btn-outline-primary py-2 px-3 btnPag" href="<?php echo constant('URL') ?>contacto">
                        Suscríbete
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
                <?php
            } else {
                foreach ($this->moreinfC as $row) {
                    $moreinfC = new Maestrias();
                    $moreinfC = $row;

                    // Validar si el id_ec coincide con el valor recibido por GET
                    if ($moreinfC->id_ec == $id_ec) {
                        ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $moreinfC->img_url; ?>" alt="">
                                <h4 class="mb-3 " style="color:#A5042D;">
                                    <?php echo $moreinfC->titulo; ?>
                                </h4>
                                <p class="mb-4">
                                    <?php echo $moreinfC->descripcion; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
            } ?>
        </div>
    </div>

</div>
<!--  End -->
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/moreinfC.js"></script>