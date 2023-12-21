<style>
    .carousel-caption {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: rgba(36, 37, 37, 0.877);
        z-index: 1;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 15%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 3rem;
        height: 3rem;
        background-color: var(--success);
        border: 12px solid var(--success);
        border-radius: 3rem;
    }

    .btn.btn-success,
    .btn.btn-outline-success:hover {
        color: #FFFFFF;
    }

    .btn.btn-success:hover {
        color: var(--success);
        background: transparent;
    }

   

    #linkImg {
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
    <div class="card-body">
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" id="sliderImg">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 pt-5">
                                        <h1 class="display-4 text-white mb-3 animated slideInDown" id="titImg"></h1>
                                        <p class="fs-5 text-white-50 mb-5 animated slideInDown" id="descImg"></p>
                                        <a class="btn btn-success py-2 px-3 me-3 animated slideInDown" id="linkImg" href="#">
                                            <span id="btnTit"></span>
                                            <div class="d-inline-flex btn-sm-square bg-white text-success rounded-circle ms-2 ml-2">
                                                <i class="fa fa-arrow-right text-success"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    </div>
</div>
<script src="<?php echo constant('URL') ?>assets/js/previewImg.js"></script>