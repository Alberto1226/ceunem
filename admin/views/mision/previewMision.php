<style>
    .border-5 {
        border-width: 5px !important;
    }

    .imgBodyMision {
        object-fit: cover;
        display: none;
    }

    .titMision,
    .titFrase,
    .autorFrase,
    .btnMision,
    .divFrase {
        display: none;
    }

    .descMision {
        text-align: justify;
        display: none;
    }
</style>

<div class="card card-default mt-3">
    <div class="card-header">
        <h3 class="card-title">Vista Previa </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <!-- Nosotros Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                            <img class="position-absolute w-100 h-100 pt-5 pe-5 imgBodyMision" id="imgBodyMision">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <h1 class="display-6 mb-5 titMision" id="titMision">Misión</h1>
                            <div class="bg-light border-bottom border-5 border-success rounded p-4 mb-4 divFrase" id="divFrase">
                                <p class="text-dark mb-2 titFrase" id="titFrase"></p>
                                <span class="text-success autorFrase" id="autorFrase"></span>
                            </div>
                            <p class="mb-5 descMision" id="descMision"></p>
                            <a class="btn btn-outline-success py-2 px-3 btnMision" id="btnMision" href="<?php echo constant('PUBLIC') ?>contacto">
                                Contáctanos
                                <div class="d-inline-flex btn-sm-square bg-success text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nosotros End -->
    </div>
</div>
<script src="<?php echo constant('URL') ?>assets/js/previewMision.js"></script>