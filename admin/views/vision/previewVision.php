<style>
    .imgVision,
    .titVision,
    .cardBodyVision{
        display: none;
    }
    .desVision{
        text-align: center;
        display: none;
    }
</style>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Vista Previa </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body d-flex justify-content-center align-items-center col-9">
        <div class="card border-secondary cardBodyVision" id="cardBodyVision">
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4 imgVision" id="imgVision">
                    <h4 class="mb-3 titVision" id="titVision">Visión</h4>
                    <p class="mb-4 desVision" id="desVision"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>assets/js/previewVision.js"></script>