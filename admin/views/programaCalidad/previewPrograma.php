<style>
    .video,
    .img_prog,
    .divSec,
    .divBtns {
        display: none;
    }

    .descProg {
        text-align: justify;
        display: none;
    }

    .btn.btn-success,
    .btn.btn-outline-success:hover {
        color: #FFFFFF;
    }

    .btn.btn-success:hover {
        color: var(--success);
        background: transparent;
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
                        <div class="position-relative overflow-hidden h-100" id="divImg" style="min-height: 400px;">
                            <img class="position-absolute w-100 h-100 pt-5 pe-5 pr-5 img_prog" id="img_prog">
                            <video id="video" controls autoplay loop class="position-absolute w-100 h-100 pt-5 pe-5 pr-5 video"></video>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-20 divSec" id="divSec">
                            <div class="d-inline-block rounded-pill bg-primary text-white py-1 px-3 mb-3" id="secProg"></div>
                        </div>
                        <h1 class="display-6 mb-5" id="titProg"></h1>
                        <p class="mb-5" id="descProg"></p>
                        <div class="divBtns" id="divBtns">
                            <a class="btn btn-success py-2 px-3 me-3" id="btn1">
                                <span></span>
                                <div class="d-inline-flex btn-sm-square bg-white text-success rounded-circle ms-2 ml-2">
                                    <i class="fa fa-arrow-right text-success"></i>
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