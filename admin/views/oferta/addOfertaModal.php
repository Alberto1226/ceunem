<div class="modal fade" id="addOfertaModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Oferta Educativa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-success border border-success">
          <div class="card-body">
            <form id="formInsertOferta" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
              <div class="card-body">
                <div class="form-group">
                  <label>Nombre de la oferta</label>
                  <select class="form-control border border-success" id="tit" name="tit">
                    <option>Seleccione una opción</option>
                    <option value="Licenciaturas">Licenciaturas</option>
                    <option value="Maestrías">Maestrías</option>
                    <option value="Educación continua">Educación continua</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control border border-success" rows="3" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion"></textarea>
                </div>
                <div class="form-group">
                  <label for="img_url">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input is-valid" id="img_url" name="img_url">
                      <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                    </div>
                  </div>
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
                      <select class="form-control border border-success" id="link" name="link">
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
                <button type="submit" class="btn btn-success btn-block" id="btn-add">Agregar Oferta</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>