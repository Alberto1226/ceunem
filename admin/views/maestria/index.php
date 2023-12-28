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
                                <h1>Maestrías</h1>
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
            <div class="container-fluid">
            <?php require 'encabezadoMaestria.php'; ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#addMasModal">
                            <i class="fa fa-plus"> Nueva Maestría</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre Maestría</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Plan de estudios</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once 'models/clases/maestrias.php';
                                foreach ($this->maestrias as $row) {
                                    $maestria = new Maestrias();
                                    $maestria = $row;
                                ?>
                                    <tr>
                                        <td class="align-middle" width="200px"><?php echo $maestria->nom_mas; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $maestria->descripcion; ?></td>
                                        <td class="align-middle"><img src="<?php echo $maestria->img_url; ?>" alt="" width="80px" /></td>
                                        <td class="align-middle" width="150px"><a target="_blank" href="<?php echo $maestria->pdf_url; ?>"><?php echo $maestria->nom_mas; ?></a></td>
                                        <td class="align-middle">
                                            <?php
                                            if ($maestria->estado == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <div class="col-auto" style="display: inline-block;">
                                                <a class="btn btn-outline-warning" data-toggle="modal" data-target="#updateMaestriaModal<?= $maestria->id_mas; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteMaestriaModal<?= $maestria->id_mas; ?>"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($maestria->estado == 1) {
                                                ?>
                                                    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#statusMaestriaModal<?= $maestria->id_mas; ?>"><i class="fa fa-arrow-down"></i></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#statusMaestriaModal<?= $maestria->id_mas; ?>"><i class="fa fa-arrow-up"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- comienza modal editar -->
                                    <div class="modal fade" id="updateMaestriaModal<?= $maestria->id_mas; ?>" tabindex="-1" aria-labelledby="updateMaestriaModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Maestría</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-warning border border-warning">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>maestria/updateMaestria" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_mas_up" value="<?= $maestria->id_mas; ?>" name="id_mas_up">
                                                                    <input type="hidden" class="form-control" id="img_url_db" value="<?= $maestria->img_url; ?>" name="img_url_db">
                                                                    <input type="hidden" class="form-control" id="pdf_url_db" value="<?= $maestria->pdf_url; ?>" name="pdf_url_db">
                                                                    <div class="form-group">
                                                                        <label for="nom_mas_up">Nombre de la Maestría</label>
                                                                        <input type="text" class="form-control border border-warning" id="nom_mas_up" value="<?= $maestria->nom_mas; ?>" placeholder="Ingrese el nombre del Programa" name="nom_mas_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_up">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_up" placeholder="Ingresa la Descripción" name="descripcion_up"><?= $maestria->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_up">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_up" value="<?= $maestria->img_url; ?>" name="img_url_up">
                                                                                <label class="custom-file-label" for="img_url_up">Seleccione la imagen</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pdf_url_up">Plan de Estudios</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="pdf_url_up" value="<?= $maestria->pdf_url; ?>" name="pdf_url_up">
                                                                                <label class="custom-file-label" for="pdf_url_up">Seleccione el plan de estudios</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-warning btn-block" id="btn-up">Actualizar Maestría</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!-- termina modal editar -->

                                    <!-- comienza modal eliminar -->
                                    <div class="modal fade" id="deleteMaestriaModal<?= $maestria->id_mas; ?>" tabindex="-1" aria-labelledby="deleteMaestriaModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar Maestría</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-danger border border-danger">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <div class="form-group text-center">
                                                                <label>¿Estás seguro de eliminar esta Maestría?</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Maestría: <?php echo $maestria->nom_mas; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>maestria/deleteMaestria" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete" value="<?= $maestria->id_mas; ?>" name="id_delete">
                                                                    <input type="hidden" class="form-control" id="img_delete" value="<?= $maestria->img_url; ?>" name="img_delete">
                                                                    <input type="hidden" class="form-control" id="pdf_delete" value="<?= $maestria->pdf_url; ?>" name="pdf_delete">
                                                                    <button type="submit" class="btn btn-danger btn-block" id="btn-de">Eliminar Maestría</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!-- termina modal eliminar -->

                                    <!-- comienza modal estado -->
                                    <div class="modal fade" id="statusMaestriaModal<?= $maestria->id_mas; ?>" tabindex="-1" aria-labelledby="statusMaestriaModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Status Maestría</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    if ($maestria->estado == 1) {
                                                    ?>
                                                        <div class="card card-dark border border-dark">
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <div class="card card-primary border border-primary">
                                                            <?php
                                                        }
                                                            ?>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <!-- form start -->
                                                                <div class="form-group text-center">
                                                                    <?php
                                                                    if ($maestria->estado == 1) {
                                                                    ?>
                                                                        <label>¿Deseas dar de baja esta Maestría?</label>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <label>¿Deseas dar de alta esta Maestría?</label>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Maestría: <?php echo $maestria->nom_mas; ?></label>
                                                                </div>
                                                                <form id="statusMas" action="<?php echo constant('URL'); ?>maestria/statusMaestria" method="POST" enctype="multipart/form-data">
                                                                    <div class="card-body">
                                                                        <input type="hidden" class="form-control" id="id_estado" value="<?= $maestria->id_mas; ?>" name="id_estado">
                                                                        <input type="hidden" class="form-control" id="estado" value="<?= $maestria->estado; ?>" name="estado">
                                                                        <?php
                                                                        if ($maestria->estado == 1) {
                                                                        ?>
                                                                            <button type="submit" class="btn btn-dark btn-block" id="btn-de">Dar de Baja</button>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <button type="submit" class="btn btn-primary btn-block" id="btn-de">Dar de Alta</button>
                                                                        <?php
                                                                        }

                                                                        ?>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.card-body -->
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <!-- termina modal estado -->
                                    <?php
                                }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre Maestría</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Plan de estudios</th>
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
    </div>
</div>
<?php require 'views/templete/footer.php'; ?>
<?php include 'addMasModal.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formEnMas.js"></script>