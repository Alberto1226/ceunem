<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<?php

$desc_detallada = $_GET['desc_detallada'];
$revoe = $_GET['revoe'];
$id_lic = $_GET['id_lic'];
$name = $_GET['name_lic'];
$pdf = $_GET['pdf'];
$imgp = $_GET['img'];

    ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn " data-wow-delay="0.1s" style="background-image: url('<?php echo constant('ARCHIVOS'). $imgp; ?>');">
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
            <div class="d-inline-block display-6" >

                <a href="<?php echo constant('ARCHIVOS') . $pdf; ?>" class="btn btn-link btn-sm float-right btnPag"
                    target="_blank" style="font-size:20px; ">
                    <i class="far fa-file-pdf" ></i> Plan de Estudio
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
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            include_once 'models/clases/licenciaturas.php';
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
                foreach ($this->moreinf as $row) {
                    $moreinf = new Licenciaturas();
                    $moreinf = $row;

                    // Validar si el id_lic coincide con el valor recibido por GET
                    if ($moreinf->id_lic == $id_lic) {
                        ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item bg-white text-justify h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $moreinf->img_url; ?>" alt="">
                                <h4 class="mb-3 " style="color:#A5042D;">
                                    <?php echo $moreinf->titulo; ?>
                                </h4>
                                <p class="mb-4">
                                    <?php echo $moreinf->descripcion; ?>
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
<script src="<?php echo constant('URL') ?>assets/js/moreinf.js"></script>