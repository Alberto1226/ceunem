<form action="#" method="post" enctype="multipart/form-data" id="formInsertVision">
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