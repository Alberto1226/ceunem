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
                                <h1>Testimonios</h1>
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
            <?php require 'encabezadoTestimonio.php'; ?>
                <div class="card">
                    <div class="card-header ">
                        <button type="button" class="btn btn-outline-success" id="addBtnOferta" onclick="agregar()" data-toggle="modal">
                            <i class="fa fa-plus"> Nuevo Testimonio</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Testimonio</th>
                                    <th>Imagen</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'views/testimonios/tabla.php';
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Testimonio</th>
                                    <th>Imagen</th>
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
<?php include 'addTestModal.php';?>
<?php include 'editTestModal.php';?>
<?php include 'deleteTestModal.php';?>
<?php include 'statusTestModal.php';?>
<?php require 'views/templete/footer.php';?>
<script src="<?php echo constant('URL') ?>assets/js/formInsertTest.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEditTest.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEnTest.js"></script>