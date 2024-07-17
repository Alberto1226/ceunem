<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s" id="navarPag">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@ceunem.edu.mx</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Siguenos en :</small>
            <a class="text-white-50 ms-3" href="https://www.facebook.com/ceunem"><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href="https://www.instagram.com/ceunemsjr/"><i
                    class="fab fa-instagram"></i></a>
            <a class="text-white-50 ms-3" href="https://api.whatsapp.com/send?phone=4272053537&text=Informe"> <i
                    class="fab fa-whatsapp"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn menuPag" data-wow-delay="0.1s">
        <a href="<?php echo constant('URL') ?>home" class="navbar-brand ms-4 ms-lg-0">
            <h5 class="responsive-text-full">CENTRO UNIVERSITARIO DE EMPRENDEDORES</h5>
            <h5 class="responsive-text-abbreviated">CEUNEM</h5>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo constant('URL') ?>home" class="nav-item nav-link" id="home-select">Inicio&nbsp;</a>
                <a href="<?php echo constant('URL') ?>nosotros" class="nav-item nav-link"
                    id="nosotros-select">Nosotros&nbsp;</a>
                <a href="<?php echo constant('URL') ?>blog" class="nav-item nav-link" id="blog-select">Blog&nbsp;</a>
                <a href="<?php echo constant('URL') ?>cursos" class="nav-item nav-link" id="cursos-select">Capacitación
                    Emperesarial&nbsp;</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Oferta Educativa&nbsp;</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?php echo constant('URL') ?>licenciatura" class="dropdown-item">Licenciaturas</a>
                        <a href="<?php echo constant('URL') ?>maestria" class="dropdown-item">Maestrías</a>
                        <a href="<?php echo constant('URL') ?>continua" class="dropdown-item">Educación Continua</a>
                    </div>
                </div>
                <a href="<?php echo constant('URL') ?>contacto" class="nav-item nav-link"
                    id="contacto-select">Contacto</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn btn-outline-primary py-2 px-3 btnPag" href="<?php echo constant('URL') ?>admision">
                    Admisión
                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </nav>
</div>
<script>

</script>
<!-- Navbar End -->