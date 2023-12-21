<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Nosotros</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?php echo constant('URL') ?>home">Inicio</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="<?php echo constant('URL') ?>nosotros">Nosotros</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<?php
include_once 'models/clases/mision.php';

foreach ($this->secMisions as $row) {
    $secMision = new Mision();
    $secMision = $row;
?>
    <!-- Nosotros Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="<?php echo constant('ARCHIVOS') . $secMision->img_body; ?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">CEUNEM</div>
                        <h1 class="display-6 mb-5">Misión</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2"><?php echo $secMision->frase; ?></p>
                            <span class="text-primary"><?php echo $secMision->autor; ?></span>
                        </div>
                        <p class="mb-5"><?php echo $secMision->mision; ?></p>
                        <a class="btn btn-outline-primary py-2 px-3" href="<?php constant('ARCHIVOS') ?>contacto">
                            Contáctanos
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Nosotros End -->
<?php
}
?>



<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Filosofía</div>
            <h1 class="display-6 mb-5">Políticas para forjar principios y valores&nbsp;</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            include_once 'models/clases/vision.php';
            foreach ($this->secVisions as $row) {
                $secVision = new Vision();
                $secVision = $row;
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $secVision->img_sec;  ?>" alt="">
                        <h4 class="mb-3"><?= $secVision->nom_sec; ?></h4>
                        <p class="mb-4"><?= $secVision->desc_sec; ?></p>
                    </div>
                </div>
            <?php
            }

            include_once 'models/clases/objetivo.php';
            foreach ($this->secObjs as $row) {
                $secObj = new Objetivo();
                $secObj = $row;
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $secObj->img_sec;  ?>" alt="">
                        <h4 class="mb-3"><?= $secObj->nom_sec; ?></h4>
                        <p class="mb-4"><?= $secObj->desc_sec; ?></p>
                    </div>
                </div>
            <?php
            }

            include_once 'models/clases/valores.php';
            foreach ($this->secVals as $row) {
                $secVal = new Objetivo();
                $secVal = $row;
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('ARCHIVOS') . $secVal->img_sec;  ?>" alt="">
                        <h4 class="mb-3"><?= $secVal->nom_sec; ?></h4>
                        <p class="mb-4"><?= nl2br($secVal->desc_sec); ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Service End -->




<!-- Equipo Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Nuestro Equipo</div>
            <h1 class="display-6 mb-5">Su dedicación es vital para el éxito de nuestra Universidad&nbsp;</h1>
        </div>
        <div class="row g-4">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    include_once 'models/clases/profesionista.php';
                    foreach ($this->secEqs as $row) {
                        $secEq = new Profesionista();
                        $secEq = $row;

                    ?>
                        <div class="swiper-slide">
                            <div class="wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item position-relative rounded overflow-hidden">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="<?php echo constant('ARCHIVOS') . $secEq->img_url; ?>" alt="">
                                    </div>
                                    <div class="team-text bg-light text-center p-4">
                                        <h5><?php echo $secEq->nombre; ?></h5>
                                        <p class="text-primary"><?php echo $secEq->puesto; ?></p>
                                        <div class="team-social text-center">
                                            <?php
                                            if (!empty($secEq->rFace)) {
                                            ?>
                                                <a class="btn btn-square" href="<?php echo $secEq->rFace; ?>"><i class="fab fa-facebook-f"></i></a>
                                            <?php
                                            } 
                                            if (!empty($secEq->rTw)) {
                                            ?>
                                                <a class="btn btn-square" href="<?php echo $secEq->rTw; ?>"><i class="fab fa-twitter"></i></a>
                                            <?php
                                            }
                                            if (!empty($secEq->rIns)) {
                                            ?>
                                                <a class="btn btn-square" href="<?php echo $secEq->rIns; ?>"><i class="fab fa-instagram"></i></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Equipo End -->
<?php require 'views/templete/footer.php'; ?>