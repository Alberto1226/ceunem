<div class="modal fade " id="addConModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Programa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-success border border-success">
          <div class="card-body">
            <!-- form start -->
            <form id="addCon" action="<?php echo constant('URL'); ?>continua/addPrograma" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nom_ec">Nombre del Prrograma</label>
                  <input type="text" class="form-control border border-success" id="nom_ec" placeholder="Ingrese el nombre del Programa" name="nom_ec">
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
                <div class="form-group">
                  <label for="pdf_url">Plan de Estudios</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input is-valid" id="pdf_url" name="pdf_url">
                      <label class="custom-file-label" for="pdf_url">Seleccione el plan de estudios</label>
                    </div>
                  </div>
                </div>
                <div class="form-group custom-control custom-radio">
                <div style="display: flex;">
                  <label for="estado" style="margin-right: 10px;">Estado del Artículo </label>
                  <p>Esta opción es para que se muestre al público</p>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success form-control" value="1" type="radio" id="activo" name="estado" checked>
                      <label for="activo" class="custom-control-label">Activo</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-danger form-control" value="0" type="radio" id="inactivo" name="estado">
                      <label for="inactivo" class="custom-control-label">Inactivo</label>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block" id="btn-add">Agregar Programa</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>