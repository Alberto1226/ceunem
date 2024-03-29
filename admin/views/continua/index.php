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
                                <h1>Educación Continua</h1>
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
                <?php require 'encabezadoContinua.php'; ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#addConModal">
                            <i class="fa fa-plus"> Nuevo Programa</i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre Maestría</th>
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
                                foreach ($this->ec_datos as $row) {
                                    $ec_dato = new ec_datos();
                                    $ec_dato = $row;

                                ?>

                                    <!-- comienza modal eliminar card -->
                                    <div class="modal fade" id="deleteCardEcModal<?= $ec_dato->id_ec_datos; ?>" tabindex="-1" aria-labelledby="deleteMasModal" aria-hidden="true">
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
                                                                <label>Card: <?php echo $ec_dato->titulo; ?></label>
                                                            </div>
                                                            <form id="deleteMas" action="<?php echo constant('URL'); ?>continua/deleteCardEc" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete_card" value="<?= $ec_dato->id_ec_datos; ?>" name="id_delete_card">
                                                                    <input type="hidden" class="form-control" id="img_delete_card" value="<?= $ec_dato->img_url; ?>" name="img_delete_card">
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
                                    <div class="modal fade" id="updateCardEcModal<?= $ec_dato->id_ec_datos; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
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
                                                            <form id="upMas" action="<?php echo constant('URL'); ?>continua/updateCardEc" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_upCard" value="<?= $ec_dato->id_ec_datos; ?>" name="id_upCard">
                                                                    <input type="hidden" class="form-control" id="img_url_db_card" value="<?= $ec_dato->img_url; ?>" name="img_url_db_card">
                                                                    <input type="hidden" class="form-control" id="id_up_licCard" value="<?= $ec_dato->id_ec; ?>" name="id_up_licCard">
                                                                    <div class="form-group">
                                                                        <label for="titulo_upCard">Titulo</label>
                                                                        <input type="text" class="form-control border border-warning" id="titulo_upCard" value="<?= $ec_dato->titulo; ?>" placeholder="Ingrese el nombre del Programa" name="titulo_upCard">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_upCard">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_upCard" placeholder="Ingresa la Descripción" name="descripcion_upCard"><?= $ec_dato->descripcion; ?></textarea>
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
                                include_once 'models/clases/continuas.php';
                                foreach ($this->continuas as $row) {
                                    $continua = new Continuas();
                                    $continua = $row;
                                ?>
                                    <tr>
                                        <td class="align-middle" width="200px"><?php echo $continua->nom_ec; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $continua->descripcion; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $continua->desc_detallada; ?></td>
                                        <td class="align-middle" width="400px"><?php echo $continua->revoe; ?></td>
                                        <td class="align-middle"><img src="<?php echo $continua->img_url; ?>" alt="" width="80px" /></td>
                                        <td class="align-middle" width="150px"><a target="_blank" href="<?php echo $continua->pdf_url; ?>"><?php echo $continua->nom_ec; ?></a></td>
                                        <td class="align-middle">
                                            <?php
                                            if ($continua->estado == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                            ?>
                                            <a class="btn btn-outline-success" data-toggle="modal" onclick="idEC(<?= $continua->id_ec; ?>)" data-target="#addCardEcModal"><i class="fa fa-plus"></i></a>
                                            <a class="btn btn-outline-primary" data-toggle="modal" onclick="" data-target="#updateEcDatsModal<?= $continua->id_ec; ?>"><i class="fa fa-clipboard"></i></a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="col-auto" style="display: inline-block;">
                                                <a class="btn btn-outline-warning" data-toggle="modal" data-target="#updateContiuaModal<?= $continua->id_ec; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteContinuaModal<?= $continua->id_ec; ?>"><i class="fa fa-trash"></i></a>
                                                <?php
                                                if ($continua->estado == 1) {
                                                ?>
                                                    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#statusContinuaModal<?= $continua->id_ec; ?>"><i class="fa fa-arrow-down"></i></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#statusContinuaModal<?= $continua->id_ec; ?>"><i class="fa fa-arrow-up"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- comienza modal editar -->
                                    <div class="modal fade" id="updateContiuaModal<?= $continua->id_ec; ?>" tabindex="-1" aria-labelledby="updateContiuaModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar Artículo</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-warning border border-warning">
                                                        <div class="card-body">
                                                            <!-- form start -->
                                                            <form id="upCon" action="<?php echo constant('URL'); ?>continua/updatePrograma" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_ec_up" value="<?= $continua->id_ec; ?>" name="id_ec_up">
                                                                    <input type="hidden" class="form-control" id="img_url_db" value="<?= $continua->img_url; ?>" name="img_url_db">
                                                                    <input type="hidden" class="form-control" id="pdf_url_db" value="<?= $continua->pdf_url; ?>" name="pdf_url_db">
                                                                    <div class="form-group">
                                                                        <label for="nom_ec_up">Nombre del Prrograma</label>
                                                                        <input type="text" class="form-control border border-warning" id="nom_ec_up" value="<?= $continua->nom_ec; ?>" placeholder="Ingrese el nombre del Programa" name="nom_ec_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="descripcion_up">Descripción</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="descripcion_up" placeholder="Ingresa la Descripción" name="descripcion_up"><?= $continua->descripcion; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="desc_detallada_up">Descripción Detallada</label>
                                                                        <textarea class="form-control border border-warning" rows="3" id="desc_detallada_up" placeholder="Ingresa la Descripción Detallada" name="desc_detallada_up"><?= $continua->desc_detallada; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="revoe_up">REVOE</label>
                                                                        <input type="text" class="form-control border border-warning" id="revoe_up" value="<?= $continua->revoe; ?>" placeholder="Ingrese el REVOE" name="revoe_up">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="img_url_up">Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="img_url_up" value="<?= $continua->img_url; ?>" name="img_url_up">
                                                                                <label class="custom-file-label" for="img_url_up">Seleccione la imagen</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pdf_url_up">Plan de Estudios</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input is-warning" id="pdf_url_up" value="<?= $continua->pdf_url; ?>" name="pdf_url_up">
                                                                                <label class="custom-file-label" for="pdf_url_up">Seleccione el plan de estudios</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-warning btn-block" id="btn-up">Actualizar Programa</button>
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
                                    <div class="modal fade" id="updateEcDatsModal<?= $continua->id_ec; ?>" tabindex="-1" aria-labelledby="updateLicModal" aria-hidden="true">
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
                                                                <h5>Cards de <?= $continua->nom_ec; ?></h3>
                                                                    <br>
                                                                    <div class="grid-container">

                                                                        <?php
                                                                        include_once 'models/clases/ec_datos.php';
                                                                        foreach ($this->ec_datos as $row) {
                                                                            $ec_dato = new ec_datos();
                                                                            $ec_dato = $row;
                                                                            if ($ec_dato->id_ec == $continua->id_ec) {

                                                                        ?>
                                                                                <div class="grid-item data-column">
                                                                                    <label><?= $ec_dato->titulo; ?></label>
                                                                                </div>
                                                                                <div class="grid-item button-column">
                                                                                    <a class="btn btn-outline-warning" data-toggle="modal" data-dismiss="modal" data-target="#updateCardEcModal<?= $ec_dato->id_ec_datos; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal" data-target="#deleteCardEcModal<?= $ec_dato->id_ec_datos; ?>"><i class="fa fa-trash"></i></a>
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
                                    <div class="modal fade" id="deleteContinuaModal<?= $continua->id_ec; ?>" tabindex="-1" aria-labelledby="deleteContinuaModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar Programa</h4>
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
                                                                <label>¿Estás seguro de eliminar este Programa?</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Programa: <?php echo $continua->nom_ec; ?></label>
                                                            </div>
                                                            <form id="deleteCon" action="<?php echo constant('URL'); ?>continua/deletePrograma" method="POST" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" class="form-control" id="id_delete" value="<?= $continua->id_ec; ?>" name="id_delete">
                                                                    <input type="hidden" class="form-control" id="img_delete" value="<?= $continua->img_url; ?>" name="img_delete">
                                                                    <input type="hidden" class="form-control" id="pdf_delete" value="<?= $continua->pdf_url; ?>" name="pdf_delete">
                                                                    <button type="submit" class="btn btn-danger btn-block" id="btn-de">Eliminar Programa</button>
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
                                    <div class="modal fade" id="statusContinuaModal<?= $continua->id_ec; ?>" tabindex="-1" aria-labelledby="statusBlogModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Status Programa</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    if ($continua->estado == 1) {
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
                                                                    if ($continua->estado == 1) {
                                                                    ?>
                                                                        <label>¿Deseas dar de baja este Programa?</label>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <label>¿Deseas dar de alta este Programa?</label>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Programa: <?php echo $continua->nom_ec; ?></label>
                                                                </div>
                                                                <form id="statusContinua" action="<?php echo constant('URL'); ?>continua/statusPrograma" method="POST" enctype="multipart/form-data">
                                                                    <div class="card-body">
                                                                        <input type="hidden" class="form-control" id="id_estado" value="<?= $continua->id_ec; ?>" name="id_estado">
                                                                        <input type="hidden" class="form-control" id="estado" value="<?= $continua->estado; ?>" name="estado">
                                                                        <?php
                                                                        if ($continua->estado == 1) {
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
<?php include 'addConModal.php'; ?>
<?php include 'addCardModal.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/formEnContinua.js"></script>