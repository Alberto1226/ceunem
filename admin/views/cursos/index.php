<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto min-content;
        gap: 10px;
    }

    .grid-item {
        padding: 10px;
        border: 1px solid #007bff;
    }

    .data-column {
        text-align: center;
    }

    .button-column {
        min-width: 120px;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-outline card-success">
            <div class="card-header">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h1>Cursos</h1>
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
                <?php require 'encabezadoCur.php'; ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#addCurModal">
                            <i class="fa fa-plus"> Nuevo Curso</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre Cursos</th>
                                    <th>Descripción</th>
                                    <th>Descripción Detallada</th>
                                    <th>REVOE</th>
                                    <th>Imagen</th>
                                    <th>Plan de estudios</th>
                                    <th>Status</th>
                                    <th>Cards</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include_once 'models/clases/mas_datos.php';
                                foreach ($this->curso_datos as $row) {
                                    $cur_dato = new curso_datos();
                                    $cur_dato = $row;

                                ?>

                                    <!-- comienza modal eliminar card -->
                                    <div class="modal fade" id="deleteCardCurModal<?= $cur_dato->id_curso_datos; ?>" tabindex="-1" aria-labelledby="deleteMasModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar Card</h4>
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
                                                                <label>¿Estás seguro de eliminar esta Card?</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Card: <?php echo $cur_dato->titulo; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>cursos/deleteCardCurso" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete_card" value="<?= $cur_dato->id_curso_datos; ?>" name="id_delete_card">
                                                                    <input type="hidden" class="form-control" id="img_delete_card" value="<?= $cur_dato->img_url; ?>" name="img_delete_card">
                                                                    <button type="submit" class="btn btn-danger btn-block" id="btn-de">Eliminar Card</button>
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
                                    <!-- termina modal eliminar card -->

                                    <!-- comienza modal editar -->
                                    <div class="modal fade" id="updateCardCurModal<?= $cur_dato->id_curso_datos; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Card</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-warning border border-warning">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>cursos/updateCardCurso" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_upCard" value="<?= $cur_dato->id_curso_datos; ?>" name="id_upCard">
                                                                    <input type="hidden" class="form-control" id="img_url_db_card" value="<?= $cur_dato->img_url; ?>" name="img_url_db_card">
                                                                    <input type="hidden" class="form-control" id="id_up_licCard" value="<?= $cur_dato->id_curso; ?>" name="id_up_licCard">
                                                                    <div class="form-group">
                                                                        <label for="titulo_upCard">Titulo</label>
                                                                        <input type="text" class="form-control border border-warning" id="titulo_upCard" value="<?= $cur_dato->titulo; ?>" placeholder="Ingrese el nombre del Programa" name="titulo_upCard">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_upCard">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_upCard" placeholder="Ingresa la Descripción" name="descripcion_upCard"><?= $cur_dato->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_upCard">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_upCard" value="" name="img_url_upCard">
                                                                                <label class="custom-file-label" for="img_url_upCard">Seleccione la imagen</label>
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

                                <?php
                                }
                                ?>

                                <?php
                                include_once 'models/clases/cursos.php';
                                foreach ($this->cursos as $row) {
                                    $cursos = new Cursos();
                                    $cursos = $row;
                                ?>
                                    <tr>
                                        <td class="align-middle" width="200px"><?php echo $cursos->nom_curso; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $cursos->descripcion; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $cursos->desc_detallada; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $cursos->revoe; ?></td>
                                        <td class="align-middle"><img src="<?php echo $cursos->img_url; ?>" alt="" width="80px" /></td>
                                        <td class="align-middle" width="150px"><a target="_blank" href="<?php echo $cursos->pdf_url; ?>"><?php echo $cursos->nom_curso; ?></a></td>
                                        <td class="align-middle">
                                            <?php
                                            if ($cursos->estado == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                            ?>
                                            <a class="btn btn-outline-success" data-toggle="modal" onclick="idCur(<?= $cursos->id_curso; ?>)" data-target="#addCardCurModal"><i class="fa fa-plus"></i></a>
                                            <a class="btn btn-outline-primary" data-toggle="modal" onclick="" data-target="#updateCurDatsModal<?= $cursos->id_curso; ?>"><i class="fa fa-clipboard"></i></a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="col-auto" style="display: inline-block;">
                                                <a class="btn btn-outline-warning" data-toggle="modal" data-target="#updateLicModal<?= $cursos->id_curso; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteLicModal<?= $cursos->id_curso; ?>"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($cursos->estado == 1) {
                                                ?>
                                                    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#statusLicModal<?= $cursos->id_curso; ?>"><i class="fa fa-arrow-down"></i></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#statusLicModal<?= $cursos->id_curso; ?>"><i class="fa fa-arrow-up"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- comienza modal editar -->
                                    <div class="modal fade" id="updateLicModal<?= $cursos->id_curso; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Curso</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-warning border border-warning">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>cursos/updateCur" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_curso_up" value="<?= $cursos->id_curso; ?>" name="id_curso_up">
                                                                    <input type="hidden" class="form-control" id="img_url_db" value="<?= $cursos->img_url; ?>" name="img_url_db">
                                                                    <input type="hidden" class="form-control" id="pdf_url_db" value="<?= $cursos->pdf_url; ?>" name="pdf_url_db">
                                                                    <div class="form-group">
                                                                        <label for="nom_curso_up">Nombre de la Maestría</label>
                                                                        <input type="text" class="form-control border border-warning" id="nom_curso_up" value="<?= $cursos->nom_curso; ?>" placeholder="Ingrese el nombre del Programa" name="nom_curso_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_up">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_up" placeholder="Ingresa la Descripción" name="descripcion_up"><?= $cursos->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="desc_detallada_up">Descripción Detallada</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="desc_detallada_up" placeholder="Ingresa la Descripción Detallada" name="desc_detallada_up"><?= $cursos->desc_detallada; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="revoe_up">REVOE</label>
                                                                        <input type="text" class="form-control border border-warning" id="revoe_up" value="<?= $cursos->revoe; ?>" placeholder="Ingrese el REVOE" name="revoe_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_up">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_up" value="<?= $cursos->img_url; ?>" name="img_url_up">
                                                                                <label class="custom-file-label" for="img_url_up">Seleccione la imagen</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pdf_url_up">Plan de Estudios</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="pdf_url_up" value="<?= $cursos->pdf_url; ?>" name="pdf_url_up">
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

                                    <!-- comienza modal editar cards-->
                                    <div class="modal fade" id="updateCurDatsModal<?= $cursos->id_curso; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Cards</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-primary border border-primary">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <div>
                                                                <h5>Cards de <?= $cursos->nom_curso; ?></h3>
                                                                    <br>
                                                                    <div class="grid-container">

                                                                        <?php
                                                                        include_once 'models/clases/curso_datos.php';
                                                                        foreach ($this->curso_datos as $row) {
                                                                            $cur_dato = new curso_datos();
                                                                            $cur_dato = $row;
                                                                            if ($cur_dato->id_curso == $cursos->id_curso) {

                                                                        ?>
                                                                                <div class="grid-item data-column">
                                                                                    <label><?= $cur_dato->titulo; ?></label>
                                                                                </div>
                                                                                <div class="grid-item button-column">
                                                                                    <a class="btn btn-outline-warning" data-toggle="modal" data-dismiss="modal" data-target="#updateCardCurModal<?= $cur_dato->id_curso_datos; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal" data-target="#deleteCardCurModal<?= $cur_dato->id_curso_datos; ?>"><i class="fa fa-trash"></i></a>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!-- termina modal editar cards-->

                                    <!-- comienza modal eliminar -->
                                    <div class="modal fade" id="deleteLicModal<?= $cursos->id_curso; ?>" tabindex="-1" aria-labelledby="deleteLicModal" aria-hidden="true">
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
                                                                <label>Maestría: <?php echo $cursos->nom_curso; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>cursos/deleteCur" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete" value="<?= $cursos->id_curso; ?>" name="id_delete">
                                                                    <input type="hidden" class="form-control" id="img_delete" value="<?= $cursos->img_url; ?>" name="img_delete">
                                                                    <input type="hidden" class="form-control" id="pdf_delete" value="<?= $cursos->pdf_url; ?>" name="pdf_delete">
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
                                    <div class="modal fade" id="statusLicModal<?= $cursos->id_curso; ?>" tabindex="-1" aria-labelledby="statusLicModal" aria-hidden="true">
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
                                                    if ($cursos->estado == 1) {
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
                                                                    if ($cursos->estado == 1) {
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
                                                                    <label>Maestría: <?php echo $cursos->nom_curso; ?></label>
                                                                </div>
                                                                <form id="statusMas" action="<?php echo constant('URL'); ?>cursos/statusCur" method="POST" enctype="multipart/form-data">
                                                                    <div class="card-body">
                                                                        <input type="hidden" class="form-control" id="id_estado" value="<?= $cursos->id_curso; ?>" name="id_estado">
                                                                        <input type="hidden" class="form-control" id="estado" value="<?= $cursos->estado; ?>" name="estado">
                                                                        <?php
                                                                        if ($cursos->estado == 1) {
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
                                    <th>Nombre Cursos</th>
                                    <th>Descripción</th>
                                    <th>Descripción Detallada</th>
                                    <th>REVOE</th>
                                    <th>Imagen</th>
                                    <th>Plan de estudios</th>
                                    <th>Status</th>
                                    <th>Cards</th>
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
<?php include 'addCurModal.php'; ?>
<?php include 'addCardModal.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formEncursos.js"></script>