<style>
    .imgVal,
    .titVal,
    .cardBodyVal{
        display: none;
    }
    .desVal{
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
    <div class="card-body d-flex justify-content-center mx-auto col-9">
        <div class="card border-secondary cardBodyVal" id="cardBodyVal">
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4 imgVal" id="imgVal">
                    <h4 class="mb-3 titVal" id="titVal">Valores</h4>
                    <p class="mb-4 desVal" id="desVal"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>assets/js/previewVision.js"></script>