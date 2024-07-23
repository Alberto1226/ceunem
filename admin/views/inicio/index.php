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
                                <h1>Inicio</h1>
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
                    require 'views/inicio/formInsertIni.php';
                ?>
                    <script src="<?php echo constant('URL') ?>assets/js/formInsertInicio.js"></script>
                <?php
                } else {
                    require 'views/inicio/formEditIni.php';
                ?>
                    <script src="<?php echo constant('URL') ?>assets/js/formEditInicio.js"></script>
                <?php
                }
                ?>
                <div>
                    <?php require 'views/inicio/previewIni.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'views/templete/footer.php'; ?>

<script src="<?php echo constant('URL') ?>assets/js/previewInicio.js"></script>