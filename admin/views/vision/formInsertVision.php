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
        <form action="#" method="post" enctype="multipart/form-data" id="formInsertVision">
            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
            <input type="hidden" id="nom_sec" value="Visión" name="nom_sec">
            <div class="form-group">
                <label for="img_url">Imagen Visión</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input is-valid inform" id="img_sec" name="img_sec" onchange="imgVision(event,'#img_sec')">
                        <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="vision">Tú Visión</label>
                <textarea class="form-control border border-success" rows="9" id="desc_sec" onchange="showInput(this)" placeholder="Ingresa la Descripción" name="desc_sec"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block btnVis" id="btnAddVis" name="btnAddVis">Guardar Configuración</button>
            </div>
        </form>
    </div>
</div>