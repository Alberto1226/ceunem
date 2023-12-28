<div class="modal fade" id="editTestModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Editar Testimonio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-warning border border-warning">
          <div class="card-body">
            <form id="formEditTest" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_usu2" name="id_usu">
            <input type="hidden" id="id_tes2" name="id_tes">
            <input type="hidden" id="img_urlBD" name="img_urlBD">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control border border-success" id="nombre2" placeholder="Ingrese el nombre del estudiante" name="nombre">
              </div>
              <div class="form-group">
                <label for="carrera">Carrera</label>
                <input type="text" class="form-control border border-success" id="carrera2" placeholder="Ingrese la carrera del estudiante" name="carrera">
              </div>
              <div class="form-group">
                <label for="testimonio">Testimonio</label>
                <textarea class="form-control border border-success" rows="3" id="testimonio2" placeholder="Ingresa la Descripción" name="testimonio"></textarea>
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
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btn-add">Guardar Datos</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>