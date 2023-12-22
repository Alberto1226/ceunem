<form action="#" method="post" enctype="multipart/form-data" id="formInsertPrograma">
    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
    <div class="form-group">
        <label for="img_url">Imagen/Video</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input is-valid inform" id="img_url" name="img_url" onchange="previewImg(event)">
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
                <label for="tit">Título</label>
                <input type="text" class="form-control border border-success" id="tit" placeholder="Ingrese el título, sugerencia:Programa de Calidad" name="tit">
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
                <label>Nombre del botón</label>
                <select class="form-control border border-success" id="btn_name" name="btn_name">
                    <option>Seleccione una opción</option>
                    <option value="Más Información">Más Información</option>
                    <option value="Conocer más">Conocer más</option>
                    <option value="Contáctanos">Contáctanos</option>
                    <option value="Leer más">Leer más</option>
                    <option value="Suscríbete">Suscríbete</option>
                    <option value="Ver más">Ver más</option>
                    <option value="Plan de estudios">Plan de estudios</option>
                    <option value="Enviar">Enviar</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Link del botón</label>
                <select class="form-control border border-success" id="sLink" name="sLink">
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
    <div class="form-group" id="otroLink" style="display: none;">
        <label for="btn_url">Link fuera del sitio para el botón 1</label>
        <input type="text" class="form-control border border-success" id="link" placeholder="Ingrese el link" name="btn_url1">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btnMis" id="btnAddMis" name="btnAddMis">Guardar Configuración</button>
    </div>
</form>