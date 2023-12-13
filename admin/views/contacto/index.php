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
                                <h1>Formulario</h1>
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
                <!-- card de formulario --->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Configuración del formulario</h3>
                        <div class="card-tools">
                            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (empty($this->fila)) {
                            require 'views/contacto/formContacto.php';
                        ?>
                            <script src="<?php echo constant('URL') ?>assets/js/formInsertForm.js"></script>
                        <?php
                        } else {
                            require 'views/contacto/formEditContacto.php';
                        ?>
                            <script src="<?php echo constant('URL') ?>assets/js/formEditForm.js"></script>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- card del preview -->
                <?php require 'views/contacto/previewContacto.php' ?>
            </div>
        </div>
    </div>
</div>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/previewForm.js"></script>