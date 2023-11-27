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


<!-- Nosotros Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100 pt-5 pe-5" src="<?php echo constant('URL') ?>assets/img/nosotros-3.jpg" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="<?php echo constant('URL') ?>assets/img/nosotros-4.jpg" alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">CEUNEM</div>
                    <h1 class="display-6 mb-5">Misión</h1>
                    <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                        <p class="text-dark mb-2">“Lo maravilloso de aprender algo, es que nadie puede arrebatárnoslo”</p>
                        <span class="text-primary">B. B. King</span>
                    </div>
                    <p class="mb-5">CEUNEM es una Institución de Educación Superior inspirada en el emprendimiento, buscando la profesionalización de manera digital de toda persona en pos de una oportunidad para potencializar su talento y capacidades tanto profesionales como personales, tomando en cuenta sus necesidades de movilidad social y laboral, brindándole la oportunidad de replantear su prospectiva como una persona productivamente exitosa, capaz de emprender y desarrollar modelos de negocios exitosos y rentables, respaldadas en el conocimiento de disciplinas formales.</p>
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
require 'views/templete/footer.php';
?>