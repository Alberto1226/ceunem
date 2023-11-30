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
                                <h1>Misión</h1>
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
                        <h3 class="card-title">Configuración de la sección</h3>
                        <div class="card-tools">
                            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo constant('URL'); ?>mision/addMision" method="post" enctype="multipart/form-data" id="formMision">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img_header">Imagen de fondo del menú</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input is-valid" id="img_header" name="img_header" onchange="imageHeader(event,'#img_header')">
                                                <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="frase">Frase</label>
                                        <textarea class="form-control border border-success" rows="4" id="frase" onchange="showInputs(this)" placeholder="Ingresa la Descripción" name="frase"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control border border-success" id="autor" onchange="showInputs(this)" placeholder="Ingresa el Título" name="autor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mision">Tú Misión</label>
                                        <textarea class="form-control border border-success" rows="4" id="mision" onchange="showInputs(this)" placeholder="Ingresa la Descripción" name="mision"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_url">Imagen Misión</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input is-valid" id="img_body" name="img_body" onchange="imageHeader(event,'#img_body')">
                                                <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">¿Desea guardar los cambios?</label>
                                        <button type="submit" class="btn btn-success btn-block btnAddMis" id="btnAddMis" onsubmit="validar()">Guardar Configuración</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        </form>
                    </div>
                </div>

                <!-- card del preview -->
                <?php require 'views/mision/previewMision.php' ?>
            </div>
        </div>
    </div>
</div>
<?php require 'views/templete/footer.php'; ?>
<script src="<?php echo constant('URL') ?>assets/js/previewMision.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formMision.js"></script>