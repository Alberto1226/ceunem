<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<?php

$desc_detallada = $_GET['desc_detallada'];
$name = $_GET['name_lic'];
$cat = $_GET['cat'];
$imgp = $_GET['img'];

    ?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn " data-wow-delay="0.1s" style="background-image: url('<?php echo constant('ARCHIVOS'). $imgp; ?>');">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4"> </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <h1 class="text-white">
                        <?php echo $name; ?>
                    </h1>
                </li>

            </ol>
            <div class="d-inline-block display-6" >

                <a  class="btn btn-link btn-sm float-right btnPag"
                    target="_blank" style="font-size:20px; ">
                    <?php echo $cat; ?>
                </a>
            </div>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="d-inline-block mb-3">
        <div class="d-inline-block rounded-pill restPagina text-white py-1 px-3 mb-3">
            <?php echo $name; ?>
        </div>
    </div>
    <h5 class=" mb-5 text-justify">
        <?php echo $desc_detallada; ?>
    </h5>
    

</div>
<!--  End -->
<?php require 'views/templete/whatsapp.php'; ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/moreinf.js"></script>