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
                                <h1>Oferta</h1>
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
            <?php require 'encabezadoOferta.php'; ?>
                <div class="card">
                    <div class="card-header ">
                        <button type="button" class="btn btn-outline-success" id="addBtnOferta" onclick="agregar()" data-toggle="modal">
                            <i class="fa fa-plus"> Nueva Oferta</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Oferta</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Nombre botoón</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'views/oferta/tabla.php';
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Oferta</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Nombre botoón</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'addOfertaModal.php' ?>
<?php include 'editOfertaModal.php' ?>
<?php include 'deleteOfertaModal.php' ?>
<?php include 'statusOfertaModal.php' ?>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formInsertarOferta.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEditOferta.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEnOferta.js"></script>