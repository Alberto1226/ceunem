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
                                <h1>Objetivos</h1>
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
                <div class="row">
                    <div class="col-md-6">
                    <?php
                        if (empty($this->fila)) {
                            require 'views/objetivo/formInsertObj.php';
                        } else {
                           require 'views/objetivo/formEditObj.php';
                        }
                    ?>
                    </div>
                    <div class="col-md-6">
                    <?php require 'views/objetivo/previewObj.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/previewObj.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formInsertObj.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEditObj.js"></script>