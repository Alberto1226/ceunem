<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edición de la sección</h3>
        <div class="card-tools">
            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data" id="formEditIni">
            <input type="hidden" id="id_usu2" name="id_usu">
            <input type="hidden" id="id_ini" name="id_ini">
            <input type="hidden" id="vid_bd" name="vid_bd">
            <div class="form-group">
                <label for="vid_url2">Video del home</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input is-valid inform" id="vid_url2" name="vid_url2" onchange="vidInicio(event,'#vid_url')">
                        <label class="custom-file-label" for="vid_url2">Seleccione el video</label>
                    </div>
                </div>
                <div class="input-group">
                        <label id="vidAct"></label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block" id="btnEditIni" name="btnEditIni">Guardar Configuración</button>
            </div>
        </form>
    </div>
</div>