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
        <form action="#" method="post" enctype="multipart/form-data" id="formInsertIni">
            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
            <div class="form-group">
                <label for="vid_url">Video del home</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input is-valid inform" id="vid_url" name="vid_url" onchange="vidInicio(event,'#vid_url')">
                        <label class="custom-file-label" for="vid_url">Seleccione el video</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btnAddIni" name="btnAddIni">Guardar Configuración</button>
            </div>
        </form>
    </div>
</div>