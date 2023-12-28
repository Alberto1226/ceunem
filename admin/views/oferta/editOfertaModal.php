<div class="modal fade" id="editOfertaModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Editar Oferta Educativa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-warning border border-warning">
          <div class="card-body">
            <form id="formEditOferta" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="id_usu2" name="id_usu">
              <input type="hidden" id="id_ofe2" name="id_ofe">
              <input type="hidden" id="img_urlBd" name="imgBd">
              <input type="hidden" id="estado2" name="estado">
              <div class="card-body">
                <div class="form-group">
                  <label>Nombre de la oferta</label>
                  <select class="form-control border border-success select2" id="tit2" name="tit">
                    <option>Seleccione una opción</option>
                    <option value="Licenciaturas">Licenciaturas</option>
                    <option value="Maestrías">Maestrías</option>
                    <option value="Educación continua">Educación continua</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control border border-success" rows="3" id="descripcion2" placeholder="Ingresa la Descripción" name="descripcion"></textarea>
                </div>
                <div class="form-group">
                  <label for="img_url">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input is-valid" id="img_url2" name="img_url">
                      <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label id="img_urlTit"></label>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nombre del botón</label>
                      <select class="form-control border border-success select2" id="btn_name2" name="btn_name">
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
                      <select class="form-control border border-success select2" id="link2" name="link">
                        <option>Seleccione una opción</option>
                        <option value="inicio">Inicio</option>
                        <option value="nosotros">Nosotros</option>
                        <option value="blog">Blog</option>
                        <option value="licenciatura">Licenciaturas</option>
                        <option value="maestria">Maestrias</option>
                        <option value="continua">Educación Continua</option>
                        <option value="contacto">Contacto</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block" id="btn-add">Guardar Cambios</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>