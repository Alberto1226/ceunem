<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-outline card-success">
            <div class="card-header">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h1>Slider 1 - Nosotros</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?php echo constant('URL') ?>panel">Home</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body">
                <?php
                if (empty($this->fila)) {
                    require 'views/slider1Nosotros/formInsertImg.php';
                ?>
                    opcion1
                    <script src="<?php echo constant('URL') ?>assets/js/formInsertNosotros.js"></script>
                <?php
                } else {                
                    require 'views/slider1Nosotros/formEditImg.php';
                ?>
                    opcion2
                    <script src="<?php echo constant('URL') ?>assets/js/formEditNosotros.js"></script>
                <?php
                }
                require 'views/slider1Nosotros/previewImg.php';
                ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo constant('URL') ?>assets/js/previewImg.js"></script>
<?php require 'views/templete/footer.php'; ?>