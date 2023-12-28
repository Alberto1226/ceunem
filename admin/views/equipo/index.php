<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Equipo de trabajo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL') ?>panel">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
    <?php require 'encabezadoEquipo.php'; ?>
        <div class="card">
            <div class="card-header ">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addEquipoModal">
                    <i class="fa fa-plus"> Nuevo Profesionista</i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Imagen</th>
                            <th>Redes</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once 'models/clases/profesionista.php';
                        if (empty($this->tablas)) {
                        ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay profesionistas agregados</td>
                            </tr>
                        <?php
                        } else {
                            require 'views/equipo/tablaEquipo.php';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Imagen</th>
                            <th>Redes</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<?php require 'views/templete/footer.php'; ?>
<?php include 'addEquipoModal.php'; ?>
<?php include 'editEquipoModal.php'; ?>
<?php include 'deleteEquipoModal.php'; ?>
<?php include 'statusEquipoModel.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formInsertEquipo.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEditEquipo.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEnEquipo.js"></script>