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
                                <h1>Visión</h1>
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
            <?php require 'encabezadoFilosofia.php'; ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (empty($this->fila)) {
                            require 'views/vision/formInsertVision.php';
                        ?>
                            <script src="<?php echo constant('URL') ?>assets/js/formInsertVision.js"></script>
                        <?php
                        } else {
                            require 'views/vision/formEditVision.php';
                        ?>
                            <script src="<?php echo constant('URL') ?>assets/js/formEditVision.js"></script>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php require 'views/vision/previewVision.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/previewVision.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEnFilosofia.js"></script>