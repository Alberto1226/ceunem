<form action="#" method="post" enctype="multipart/form-data" id="formInsertPrograma">
    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
    <div class="form-group">
        <label for="img_url">Imagen/Video</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input is-valid inform" id="img_url" name="img_url" onchange="previewImg(event, '#img_prog')">
                <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Sección a la que hace referencia</label>
                <select class="form-control border border-success" id="nom_menu" name="nom_menu">
                    <option>Seleccione una opción</option>
                    <option value="inicio">Inicio</option>
                    <option value="nosotros">Nosotros</option>
                    <option value="blog">Blog</option>
                    <option value="oferta">Oferta Educativa</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="tit_prog">Título</label>
                <input type="text" class="form-control border border-success" id="tit_prog" placeholder="Ingrese el título, sugerencia:Programa de Calidad" name="tit_prog">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control border border-success" rows="6" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion"></textarea>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="btn_name1">Titulo del botón 1</label>
                <input type="text" class="form-control border border-success" id="btn_name1" placeholder="Ingrese el título" name="btn_name1">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Link del botón</label>
                <select class="form-control border border-success" id="sLink1" name="sLink1">
                    <option>Seleccione una opción</option>
                    <option value="inicio">Inicio</option>
                    <option value="nosotros">Nosotros</option>
                    <option value="blog">Blog</option>
                    <option value="licenciatura">Licenciaturas</option>
                    <option value="maestria">Maestrias</option>
                    <option value="continua">Educación Continua</option>
                    <option value="contacto">Contacto</option>
                    <option value="otro">Link fuera del sitio</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group" id="otroLink1" style="display: none;">
        <label for="btn_url1">Link fuera del sitio para el botón 1</label>
        <input type="text" class="form-control border border-success" id="btn_url1" placeholder="Ingrese el link" name="btn_url1">
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="btn_name2">Título del botón 2</label>
                <input type="text" class="form-control border border-success" id="btn_name2" placeholder="Ingrese el título" name="btn_name2">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Link del botón</label>
                <select class="form-control border border-success" id="sLink2" name="sLink2">
                    <option>Seleccione una opción</option>
                    <option value="inicio">Inicio</option>
                    <option value="nosotros">Nosotros</option>
                    <option value="blog">Blog</option>
                    <option value="licenciatura">Licenciaturas</option>
                    <option value="maestria">Maestrias</option>
                    <option value="continua">Educación Continua</option>
                    <option value="contacto">Contacto</option>
                    <option value="otro">Link fuera del sitio</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group" id="otroLink2" style="display: none;">
        <label for="btn_url2">Link fuera del sitio para el botón 2</label>
        <input type="text" class="form-control border border-success" id="btn_url2" placeholder="Ingrese el link" name="btn_url2">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btnMis" id="btnAddMis" name="btnAddMis">Guardar Configuración</button>
    </div>
</form>