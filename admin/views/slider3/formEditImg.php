<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Esta sera su imagen principal de inicio</h3>
        <div class="card-tools">
            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data" id="formEditImg3" class="formularioImagenes">
            <input type="hidden" id="id_slider" name="id_slider" value="3">
            <input type="hidden" id="id_usu" name="id_usu">
            <input type="hidden" id="posicion" name="posicion">
            <input type="hidden" id="imgBD" name="imgBD">
            <input type="hidden" id="seccion" name="seccion" value="inicio">
            <div class="form-group">
                <label for="img">Imagen</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input is-valid inform" id="img" name="img"
                            onchange="imgSlider(event, '#sliderImg')">
                        <label class="custom-file-label" for="img">Seleccione la imagen</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label id="imgTit"></label>
            </div>
            <div class="form-group">
                <label for="tit">Título</label>
                <input type="text" class="form-control border border-success" id="tit" placeholder="Ingrese el título"
                    name="tit">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control border border-success" rows="4" id="descripcion"
                    placeholder="Ingresa la Descripción" name="descripcion"></textarea>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre del botón</label>
                        <select class="form-control border border-success" id="sName" name="sName">
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
                <label for="link">Link fuera del sitio</label>
                <input type="text" class="form-control border border-success" id="link" placeholder="Ingrese el link"
                    name="link">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block" id="btnImagen_1"
                    name="btnImagen_1">Guardar</button>
            </div>
        </form>
    </div>
</div>