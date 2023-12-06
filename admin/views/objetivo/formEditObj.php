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
        <form action="#" method="post" enctype="multipart/form-data" id="formEditObj">
            <input type="hidden" id="id_usu" value="<?php echo $this->tabla->id_usu; ?>" name="id_usu">
            <input type="hidden" id="id_obj" value="<?php echo $this->tabla->id_obj; ?>" name="id_obj">
            <input type="hidden" id="img_bd" value="<?php echo $this->tabla->img_sec; ?>" name="img_bd">
            <input type="hidden" id="nom_sec" value="<?php echo $this->tabla->nom_sec; ?>" name="nom_sec">
            <div class="form-group">
                <label for="img_url">Imagen Visión</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input is-valid inform" id="img_sec" name="img_sec" value="<?php echo $this->tabla->img_sec; ?>" onchange="imgObj(event,'#img_sec')">
                        <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                    </div>
                </div>
                <div class="input-group">
                        <label>Imagen Actual: <?php echo basename($this->tabla->img_sec); ?></label>
                </div>
            </div>
            <div class="form-group">
                <label for="objetivos">Tus Objetivos</label>
                <textarea class="form-control border border-success" rows="9" id="desc_sec" onchange="showInput(this)" placeholder="Ingresa la Descripción" name="desc_sec"><?php echo $this->tabla->desc_sec; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block" id="btnEditObj" name="btnEditObj">Guardar Configuración</button>
            </div>
        </form>
    </div>
</div>