<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn bannerImgAsc" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Contacto</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Contacto Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill restPagina text-white px-3 mb-3">¡Contáctanos!</div>
                <h1 class="display-6 mb-5">Comunícate con nosotros</h1>
                <p class="mb-4 text-light">Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Para unirse a nuestra gran comunidad, ingrese sus datos a continuación para poder recibir información sobre la carrera de su interés y comience el proceso de inscripción hoy mismo.</p>
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
                        <button class="btn btn-primary py-2 px-3 me-3 btnPag">
                            Envíar
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">

                    <div class="position-relative w-100 h-100 divMapa">
                        <?php echo $this->mapa->mapa; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacto End -->
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/contacto.js"></script>