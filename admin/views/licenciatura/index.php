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
                                <h1>Licenciaturas</h1>
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
                <?php require 'encabezadoLic.php'; ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#addLicModal">
                            <i class="fa fa-plus"> Nueva Licenciatura</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre Licenciatura</th>
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
                                include_once 'models/clases/lic_datos.php';
                                foreach ($this->lic_datos as $row) {
                                    $lic_dato = new lic_datos();
                                    $lic_dato = $row;

                                ?>

                                    <!-- comienza modal eliminar card -->
                                    <div class="modal fade" id="deleteCardLicModal<?= $lic_dato->id_lic_datos; ?>" tabindex="-1" aria-labelledby="deleteLicModal" aria-hidden="true">
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
                                                                <label>Card: <?php echo $lic_dato->titulo; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>licenciatura/deleteCardLic" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete_card" value="<?= $lic_dato->id_lic_datos; ?>" name="id_delete_card">
                                                                    <input type="hidden" class="form-control" id="img_delete_card" value="<?= $lic_dato->img_url; ?>" name="img_delete_card">
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
                                    <div class="modal fade" id="updateCardLicModal<?= $lic_dato->id_lic_datos; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
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
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>licenciatura/updateCardLic" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_upCard" value="<?= $lic_dato->id_lic_datos; ?>" name="id_upCard">
                                                                    <input type="hidden" class="form-control" id="img_url_db_card" value="<?= $lic_dato->img_url; ?>" name="img_url_db_card">
                                                                    <input type="hidden" class="form-control" id="id_up_licCard" value="<?= $lic_dato->id_lic; ?>" name="id_up_licCard">
                                                                    <div class="form-group">
                                                                        <label for="titulo_upCard">Titulo</label>
                                                                        <input type="text" class="form-control border border-warning" id="titulo_upCard" value="<?= $lic_dato->titulo; ?>" placeholder="Ingrese el nombre del Programa" name="titulo_upCard">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_upCard">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_upCard" placeholder="Ingresa la Descripción" name="descripcion_upCard"><?= $lic_dato->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_upCard">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_upCard" value="<?= $licenciatura->img_url; ?>" name="img_url_upCard">
                                                                                <label class="custom-file-label" for="img_url_upCard">Seleccione la imagen</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-warning btn-block" id="btn-up">Actualizar Licenciatura</button>
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
                                include_once 'models/clases/licenciaturas.php';
                                foreach ($this->licenciaturas as $row) {
                                    $licenciatura = new Licenciaturas();
                                    $licenciatura = $row;
                                ?>
                                    <tr>
                                        <td class="align-middle" width="200px"><?php echo $licenciatura->nom_lic; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $licenciatura->descripcion; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $licenciatura->desc_detallada; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $licenciatura->revoe; ?></td>
                                        <td class="align-middle"><img src="<?php echo $licenciatura->img_url; ?>" alt="" width="80px" /></td>
                                        <td class="align-middle" width="150px"><a target="_blank" href="<?php echo $licenciatura->pdf_url; ?>"><?php echo $licenciatura->nom_lic; ?></a></td>
                                        <td class="align-middle">
                                            <?php
                                            if ($licenciatura->estado == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                            ?>
                                            <a class="btn btn-outline-success" data-toggle="modal" onclick="idLic(<?= $licenciatura->id_lic; ?>)" data-target="#addCardModal"><i class="fa fa-plus"></i></a>
                                            <a class="btn btn-outline-primary" data-toggle="modal" onclick="" data-target="#updateDatsModal<?= $licenciatura->id_lic; ?>"><i class="fa fa-clipboard"></i></a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="col-auto" style="display: inline-block;">
                                                <a class="btn btn-outline-warning" data-toggle="modal" data-target="#updateLicModal<?= $licenciatura->id_lic; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteLicModal<?= $licenciatura->id_lic; ?>"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($licenciatura->estado == 1) {
                                                ?>
                                                    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#statusLicModal<?= $licenciatura->id_lic; ?>"><i class="fa fa-arrow-down"></i></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#statusLicModal<?= $licenciatura->id_lic; ?>"><i class="fa fa-arrow-up"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- comienza modal editar -->
                                    <div class="modal fade" id="updateLicModal<?= $licenciatura->id_lic; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Licenciatura</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-warning border border-warning">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>licenciatura/updateLic" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_lic_up" value="<?= $licenciatura->id_lic; ?>" name="id_lic_up">
                                                                    <input type="hidden" class="form-control" id="img_url_db" value="<?= $licenciatura->img_url; ?>" name="img_url_db">
                                                                    <input type="hidden" class="form-control" id="pdf_url_db" value="<?= $licenciatura->pdf_url; ?>" name="pdf_url_db">
                                                                    <div class="form-group">
                                                                        <label for="nom_lic_up">Nombre de la Maestría</label>
                                                                        <input type="text" class="form-control border border-warning" id="nom_lic_up" value="<?= $licenciatura->nom_lic; ?>" placeholder="Ingrese el nombre del Programa" name="nom_lic_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_up">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_up" placeholder="Ingresa la Descripción" name="descripcion_up"><?= $licenciatura->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="desc_detallada_up">Descripción Detallada</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="desc_detallada_up" placeholder="Ingresa la Descripción Detallada" name="desc_detallada_up"><?= $licenciatura->desc_detallada; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="revoe_up">REVOE</label>
                                                                        <input type="text" class="form-control border border-warning" id="revoe_up" value="<?= $licenciatura->revoe; ?>" placeholder="Ingrese el REVOE" name="revoe_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_up">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_up" value="<?= $licenciatura->img_url; ?>" name="img_url_up">
                                                                                <label class="custom-file-label" for="img_url_up">Seleccione la imagen</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pdf_url_up">Plan de Estudios</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="pdf_url_up" value="<?= $licenciatura->pdf_url; ?>" name="pdf_url_up">
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
                                    <div class="modal fade" id="updateDatsModal<?= $licenciatura->id_lic; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
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
                                                                <h5>Cards de <?= $licenciatura->nom_lic; ?></h3>
                                                                    <br>
                                                                    <div class="grid-container">

                                                                        <?php
                                                                        include_once 'models/clases/lic_datos.php';
                                                                        foreach ($this->lic_datos as $row) {
                                                                            $lic_dato = new lic_datos();
                                                                            $lic_dato = $row;
                                                                            if ($lic_dato->id_lic == $licenciatura->id_lic) {

                                                                        ?>
                                                                                <div class="grid-item data-column">
                                                                                    <label><?= $lic_dato->titulo; ?></label>
                                                                                </div>
                                                                                <div class="grid-item button-column">
                                                                                    <a class="btn btn-outline-warning" data-toggle="modal" data-dismiss="modal" data-target="#updateCardLicModal<?= $lic_dato->id_lic_datos; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal" data-target="#deleteCardLicModal<?= $lic_dato->id_lic_datos; ?>"><i class="fa fa-trash"></i></a>
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
                                    <div class="modal fade" id="deleteLicModal<?= $licenciatura->id_lic; ?>" tabindex="-1" aria-labelledby="deleteLicModal" aria-hidden="true">
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
                                                                <label>Maestría: <?php echo $licenciatura->nom_lic; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>licenciatura/deleteLic" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete" value="<?= $licenciatura->id_lic; ?>" name="id_delete">
                                                                    <input type="hidden" class="form-control" id="img_delete" value="<?= $licenciatura->img_url; ?>" name="img_delete">
                                                                    <input type="hidden" class="form-control" id="pdf_delete" value="<?= $licenciatura->pdf_url; ?>" name="pdf_delete">
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
                                    <div class="modal fade" id="statusLicModal<?= $licenciatura->id_lic; ?>" tabindex="-1" aria-labelledby="statusLicModal" aria-hidden="true">
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
                                                    if ($licenciatura->estado == 1) {
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
                                                                    if ($licenciatura->estado == 1) {
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
                                                                    <label>Maestría: <?php echo $licenciatura->nom_lic; ?></label>
                                                                </div>
                                                                <form id="statusMas" action="<?php echo constant('URL'); ?>licenciatura/statusLic" method="POST" enctype="multipart/form-data">
                                                                    <div class="card-body">
                                                                        <input type="hidden" class="form-control" id="id_estado" value="<?= $licenciatura->id_lic; ?>" name="id_estado">
                                                                        <input type="hidden" class="form-control" id="estado" value="<?= $licenciatura->estado; ?>" name="estado">
                                                                        <?php
                                                                        if ($licenciatura->estado == 1) {
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
                                    <th>Nombre Licenciatura</th>
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
<?php include 'addLicModal.php'; ?>
<?php include 'addCardModal.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formEnLic.js"></script>