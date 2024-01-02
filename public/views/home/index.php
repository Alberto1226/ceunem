<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper3">
        <div class="swiper-wrapper">
            <?php
            include_once 'models/clases/imagen.php';
            foreach ($this->sliders as $row) {
                $slider = new Imagen();
                $slider = $row;
                $url = $slider->tUrl = 1 ? $url = constant('URL') . $slider->link : $slider->link;
            ?>
                <div class="swiper-slide">
                    <div class="parallax-bg" data-swiper-parallax="-23%">
                        <img src="<?php echo constant('ARCHIVOS') . $slider->img ?>" alt="" class="imgSlider">
                    </div>
                    <!-- <div class="title" data-swiper-parallax="-300">Slide 1</div> -->
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown"><?= $slider->tit ?></h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown"><?= $slider->descripcion ?></p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown btnPag" href="<?php echo $url ?>">
                                        <span><?= $slider->btn_name; ?></span>
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- Carousel End -->

<!-- Nosotros Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img id="imgProg" class="position-absolute w-100 h-100 pt-5 pe-5" alt="" style="object-fit: cover; display: none;">
                    <video id="vidProg" controls autoplay loop muted class="position-absolute w-100 h-100 pt-5 pe-5 pr-5 video" style="object-fit: cover; display: none;"></video>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-20">
                    <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3" id="nom_menu"></div>
                </div>
                <h1 class="display-6 mb-5" id="titProg"></h1>
                <p class="mb-5" id="descripcion"></p>
                <a class="btn btn-primary py-2 px-3 me-3 btnPag" id="linkProg">
                    <span id="btn_name"></span>
                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Nosotros End -->

<!-- Blog Start -->
<div class="container-xxl bg-light my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3" id="enBlog"></div>
            <h1 class="display-6 mb-5" id="descBlog"></h1>
        </div>
        <div class="row g-4">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    include_once 'models/clases/articulo.php';
                    foreach ($this->articulos as $row) {
                        $articulo = new Articulo();
                        $articulo = $row;
                    ?>
                        <div class="swiper-slide">
                            <div class="wow fadeInUp" data-wow-delay="0.1s">
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
                                                <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                    <i class="fa fa-arrow-right"></i>
                                                </div>
                                            </a>
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
<!-- Blog End -->

<!-- Oferta Educativa Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3" id="enOferta"></div>
            <h1 class="display-6 mb-5" id="descOferta"></h1>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                include_once 'models/clases/ofertas.php';
                foreach ($this->ofertas as $row) {
                    $oferta = new Ofertas();
                    $oferta = $row;
                ?>
                    <div class="swiper-slide wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card service-item bg-white text-center p-4 p-xl-5">
                            <img src="<?php echo constant('ARCHIVOS') . $oferta->img_url; ?>" class="card-img-top img-fluid mb-4" alt="Imagen de la tarjeta">
                            <div class="card-body">
                                <h4 class="card-title"><?= $oferta->tit; ?></h4>
                                <p class="card-text" style="height: 300px;"><?= $oferta->descripcion; ?></p>
                            </div>
                            <a class="btn btn-outline-primary px-3 btnPag" href="<?php echo constant('URL') . $oferta->link; ?>">
                                <span><?= $oferta->btn_name; ?></span>
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!-- Oferta Educativa End -->

<!-- Contacto Start -->
<div class="container-fluid donate " data-parallax="" data-image-src="<?php echo constant('URL') ?>assets/img/carousel-2.jpg">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-white px-3 mb-3">Contacto</div>
                <h1 class="display-6 text-white mb-5">¡Comunícate con nosotros!&nbsp;</h1>
                <p class="text-white-50 mb-0">Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Para unirse a nuestra gran comunidad, ingrese sus datos a continuación para poder recibir información sobre la carrera de su interés y comience el proceso de inscripción hoy mismo.</p>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-5">
                    <form action="<?php echo constant('URL'); ?>contacto/sendEmail" method="post">
                        <?php
                        include_once 'models/clases/formulario.php';
                        foreach ($this->inputs as $row) {
                            $input = new Formulario();
                            $input = $row;
                        ?>
                            <div class="form-group">
                                <input type="text" class="form-control inform" id="nCompleto" placeholder="Ingresa Nombre Completo" name="nCompleto" style="display: <?php echo $input->nCompleto === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control inform" id="nombre" placeholder="Ingresa Nombre(s)" name="nombre" style="display: <?php echo $input->nombre === 1 ? "inline" : "none"; ?>;">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control inform" id="apellidos" placeholder="Ingresa Apellidos" name="apellidos" style="display: <?php echo $input->apellidos === 1 ? "inline" : "none"; ?>;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control inform" id="email" placeholder="Ingrese su Email" name="email" style="display: <?php echo $input->email === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control inform" id="tel" placeholder="Ingrese su Teléfono" name="tel" style="display: <?php echo $input->tel === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control inform" id="face" placeholder="Ingrese su link de Facebook" name="face" style="display: <?php echo $input->face === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control inform" id="live" placeholder="Ingrese el estado de donde se comunica" name="live" style="display: <?php echo $input->live === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control inform" id="asunto" placeholder="Ingrese el Asunto" name="asunto" style="display: <?php echo $input->asunto === 1 ? "inline" : "none"; ?>;">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control inform" rows="3" id="mensaje" placeholder="Ingrese su mensaje" name="mensaje" style="display: <?php echo $input->mensaje === 1 ? "inline" : "none"; ?>;"></textarea>
                            </div>
                        <?php } ?>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary py-2 px-3 me-3 btnPag" >
                                Envíar
                                <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacto End -->

<!-- Nuestro Equipo Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3" id="enEquipo"></div>
            <h1 class="display-6 mb-5" id="descEquipo"></h1>
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
                                                <a class="btn btn-square btnPag" href="<?php echo $secEq->rFace; ?>"><i class="fab fa-facebook-f"></i></a>
                                            <?php
                                            }
                                            if (!empty($secEq->rTw)) {
                                            ?>
                                                <a class="btn btn-square btnPag" href="<?php echo $secEq->rTw; ?>"><i class="fab fa-twitter"></i></a>
                                            <?php
                                            }
                                            if (!empty($secEq->rIns)) {
                                            ?>
                                                <a class="btn btn-square btnPag" href="<?php echo $secEq->rIns; ?>"><i class="fab fa-instagram"></i></a>
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
<!-- Nuestro Equipo End -->

<!-- Testimonios Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3" id="enTestimonio"></div>
            <h1 class="display-6 mb-5" id="descTestimonio"></h1>
        </div>
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <?php
                include_once 'models/clases/testimonio.php';
                foreach ($this->testimonios as $row) {
                    $testimonio = new Testimonio();
                    $testimonio = $row;
                ?>
                    <div class="swiper-slide wow fadeInUp" data-wow-delay="0.1s" style=" display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;  ">
                        <div class="card mb-3" style="width: 85%; height: 85%;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?php echo constant('ARCHIVOS') . $testimonio->img_url; ?>" style="width: 95%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body" style="text-align: left;">
                                        <h5 class="card-title"><?= $testimonio->nombre; ?></h5>
                                        <p class="card-text"><?= $testimonio->carrera; ?></p>
                                        <p class="card-text"><small class="text-muted"><?= $testimonio->testimonio; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!-- Testimonios End -->
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/home.js"></script>
<script>
    var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiper3 = new Swiper(".mySwiper3", {
        speed: 600,
        parallax: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>