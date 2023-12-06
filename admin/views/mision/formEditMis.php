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
                        <input type="file" class="custom-file-input is-valid inform" id="img_body" name="img_body" value="<?= $this->tabla->img_body; ?>" onchange="imageHeader(event,'#img_body')">
                        <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                        <label class="custom-file-label" for="img_url"><?= $this->tabla->img_body; ?> </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="frase">Frase</label>
                <textarea class="form-control border border-success" rows="2" id="frase" placeholder="Ingresa la Descripción" required name="frase" onchange="showInputs(this)"><?= $this->tabla->frase; ?></textarea>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" class="form-control border border-success inform" id="autor" required value="<?= $this->tabla->autor; ?>" onchange="showInputs(this)" placeholder="Ingresa el Título" name="autor">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="mision">Tú Misión</label>
                <textarea class="form-control border border-success" rows="9" id="mision" required placeholder="Ingresa la Descripción" name="mision" onchange="showInputs(this)"><?= $this->tabla->mision; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block btnEditMis" id="btnEditMis" name="btnEditMis" onsubmit="return validar()">Guardar Configuración</button>
    </div>
</form>