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
    include_once 'models/mision.php';

    foreach($this->secMisions as $row){
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
                    <a class="btn btn-outline-primary py-2 px-3" href="<?php echo constant('URL') ?>contacto">
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
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/vision.png" alt="">
                        <h4 class="mb-3">Visión&nbsp;</h4>
                        <p class="mb-4">Ser la mejor opción dentro de las Instituciones de educación Universitaria, al sobresalir en el mercado de los servicios educativos digitales que otorga un valor agregado a la enseñanza profesional, empoderando académicamente a nuestros estudiantes en el desarrollo de conocimientos, capacidades y habilidades profesionales, así como en el desarrollo de estrategias de emprendimiento para establecer proyectos de negocio exitosos y rentables.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/objetivos.png" alt="">
                        <h4 class="mb-3">Objetivos</h4>
                        <p class="mb-4">Empoderar académicamente a nuestros estudiantes asociados a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación. Impulsar en nuestros estudiantes asociados una actitud emprendedora para superar los retos actuales de la competencia profesional laboral. Estimular en nuestros estudiantes asociados un comportamiento de responsabilidad profesional y liderazgo con carácter duradero.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/valores.png" alt="">
                        <h4 class="mb-3">Valores</h4>
                        <p class="mb-4">Emprendimiento</p>
						<p class="mb-4">Liderazgo</p>
						<p class="mb-4">Disciplina</p>
						<p class="mb-4">Innovación</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Equipo Start -->
   <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Nuestro Equipo</div>
                <h1 class="display-6 mb-5">Su dedicación  es vital para el éxito de nuestra Universidad&nbsp;</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-1.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Mtro.&nbsp;</h5>
                            <p class="text-primary">Rector</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-2.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Lic.</h5>
                            <p class="text-primary">Directora</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-3.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Mtra.</h5>
                            <p class="text-primary">Coordinador Académico</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-4.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Lic.</h5>
                            <p class="text-primary">Servicios Escolares</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Equipo End -->
<?php
require 'views/templete/footer.php';
?>