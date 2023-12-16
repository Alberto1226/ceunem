<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Admisión</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Admision Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Proceso de Admisión</div>
                <p class="mb-0">1. Llene el formulario de solicitud de información en la página web de la institución.</p>
                <p class="mb-0">&nbsp;</p>
                <p class="mb-0">2. Un asesor se comunicará con usted para brindarle los informes de inscripción, documentación solicitada y le explicará la forma de pago y la metodología de enseñanza de la institución.</p>
                <p class="mb-0">&nbsp;</p>
                <p class="mb-0">3. Tendrá que llenar de manera digital la ficha de inscripción, imprimirla, firmar y enviarla al correo brindado por el asesor académico.</p>
                <p class="mb-0">&nbsp;</p>
                <p class="mb-0">4. Deberá mandar su documentación solicitada para su análisis y posteriormente de igual forma mandarlo al correo asignado por el asesor.</p>
                <p class="mb-0">&nbsp;</p>
                <p class="mb-0">5. Una vez realizado lo anterior, recibirá una notificación a su correo y llamada telefónica para informarle que fue aceptado y brindarle su usuario y contraseña para tomar el curso de inducción para el manejo de nuestra plataforma.</p>
                <p class="mb-0">&nbsp;</p>
                <p class="mb-0">6. Podrá iniciar su carrera de acuerdo a sus tiempos y organización, siempre recibirá nuestro apoyo para que concluya satisfactoriamente su carrera.</p>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-secondary p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="name" placeholder="Your Name">
                                    <label for="name">Nombre Completo</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="email" placeholder="Your Email">
                                    <label for="email">Correo Electrónico</label>
                                </div>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary px-5" style="height: 60px;">
                                    Descargar Formulario
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Admision End -->

<?php require 'views/templete/footer.php'; ?>