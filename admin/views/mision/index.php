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
                        <?php
                        if (empty($this->tabla)) {
                        ?>
                        <h3 class="card-title">Configuración de la sección</h3>
                        <?php
                        } else {
                        ?>
                        <h3 class="card-title">Edición de la sección</h3>
                        <?php
                        }
                         
                        ?>
                        
                        <div class="card-tools">
                            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if(empty($this->tabla)){
                        ?>
                            <form action="#" method="post" enctype="multipart/form-data" id="formInsertMision">
                                <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="img_url">Imagen Misión</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input is-valid inform" id="img_body" name="img_body" onchange="imageHeader(event,'#img_body')">
                                                    <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="frase">Frase</label>
                                            <textarea class="form-control border border-success" rows="2" id="frase" onchange="showInputs(this)" placeholder="Ingresa la Descripción" name="frase"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="autor">Autor</label>
                                            <input type="text" class="form-control border border-success inform" id="autor" onchange="showInputs(this)" placeholder="Ingresa el Título" name="autor">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mision">Tú Misión</label>
                                            <textarea class="form-control border border-success" rows="9" id="mision" onchange="showInputs(this)" placeholder="Ingresa la Descripción" name="mision"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block btnMis" id="btnAddMis" name="btnAddMis">Guardar Configuración</button>
                                </div>
                            </form>
                        <?php
                        }else{
                        ?>
                            <form action="#" method="post" enctype="multipart/form-data" id="formEditMis">
                                <input type="hidden" id="id_usu" value="<?php echo $this->tabla->id_usu; ?>" name="id_usu">
                                <input type="hidden" id="id_mis" value="<?php echo $this->tabla->id_mis; ?>" name="id_mis">
                                <input type="hidden" id="img_bd" value="<?php echo $this->tabla->img_body; ?>" name="img_bd">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="img_url2">Imagen Misión</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input is-valid inform" id="img_body" name="img_body" value="<?= $this->tabla->img_body;?>" onchange="imageHeader(event,'#img_body')">
                                                    <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                                                    <label class="custom-file-label" for="img_url"><?= $this->tabla->img_body;?> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="frase">Frase</label>
                                            <textarea class="form-control border border-success" rows="2" id="frase" placeholder="Ingresa la Descripción" required name="frase" onchange="showInputs(this)" ><?= $this->tabla->frase;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="autor">Autor</label>
                                            <input type="text" class="form-control border border-success inform" id="autor" required
                                            value="<?= $this->tabla->autor;?>"  onchange="showInputs(this)"  placeholder="Ingresa el Título" name="autor">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mision">Tú Misión</label>
                                            <textarea class="form-control border border-success" rows="9" id="mision" required placeholder="Ingresa la Descripción" name="mision" onchange="showInputs(this)"><?= $this->tabla->mision;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-block btnEditMis" id="btnEditMis" name="btnEditMis" onsubmit="return validar()">Guardar Configuración</button>
                                </div>
                            </form>
                        <?php
                        } 
                        ?>
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
<script src="<?php echo constant('URL') ?>assets/js/formInsertMision.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/formEdittMision.js"></script>