<div class="modal fade " id="addMasModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Maestría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-success border border-success">
          <div class="card-body">
            <!-- form start -->
            <form id="addLic" action="<?php echo constant('URL'); ?>maestria/addMaestria" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nom_mas">Nombre Maestría</label>
                  <input type="text" class="form-control" id="nom_mas" placeholder="Ingrese el nombre de la maestría" name="nom_mas">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control" rows="3" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion"></textarea>
                </div>
                <div class="form-group">
                  <label for="img_url">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img_url" name="img_url">
                      <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pdf_url">Plan de Estudios</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="pdf_url" name="pdf_url">
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
                  <div class="form-group">
                    <label for="desc_detallada">Descripción Detallada</label>
                    <textarea class="form-control" rows="3" id="desc_detallada" placeholder="Ingresa la Descripción" name="desc_detallada"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="revoe">REVOE</label>
                    <input type="text" class="form-control" id="revoe" placeholder="Ingrese el nombre de la Licenciatura" name="revoe">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success btn block" id="btn-add">Agregar Maestría</button>
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