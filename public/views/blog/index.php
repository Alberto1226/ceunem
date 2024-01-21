<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bannerImgAsc" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Blog</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?php echo constant('URL') ?>home">Incio</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container-xxl bg-light my-5 py-5">
    <div class="container py-5">
        <?php 
        $tit = $this->header->encabezado == 'Blog' ? $tit = 'Artículos' : $tit ='Blog';?>
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill restPagina text-white py-1 px-3 mb-3"><?= $tit; ?></div>
            <h1 class="display-6 mb-5"><?= $this->header->descripcion; ?></h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            include_once 'models/clases/articulo.php';
            if (empty($this->fila)) {
            ?>
                <div class="col-lg-6">
                    <h1 class="display-1">Proximamente</h1>
                    <p class="mb-4">Todavía estamos trabajando arduamente para que la magia suceda (no puedes apurar la perfección), así que deberás esperar un poco más. Asegúrate de suscribirte a las últimas actualizaciones y estar al tanto de cuando tengamos nuevas carreras, maestrías y cursos para tí.</p>
                    <a class="btn btn-outline-primary py-2 px-3 btnPag" href="<?php echo constant('URL') ?>contacto">
                        Suscríbete
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
                <?php
            } else {
                foreach ($this->articulos as $row) {
                    $articulo = new Articulo();
                    $articulo = $row;
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                            <div class="text-center p-4 pt-0">
                                <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                    <small><?php echo $articulo->categoria; ?></small>
                                </div>
                                <h5 class="mb-3"><?php echo $articulo->titulo; ?></h5>
                                <p><?php echo $articulo->descripcion; ?></p>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" src="<?php echo constant('ARCHIVOS') . $articulo->img_url; ?>" alt="">
                                <div class="causes-overlay">
                                    <a class="btn btn-outline-primary btnPag" href="<?php echo $articulo->link_url; ?>" target="_blank">
                                        Leer más
                                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/blog.js"></script>