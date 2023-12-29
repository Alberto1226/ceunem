<div class="modal fade" id="addTestModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Testimonio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-success border border-success">
          <div class="card-body">
            <form id="formInsertTest" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control border border-success" id="nombre" placeholder="Ingrese el nombre del estudiante" name="nombre">
              </div>
              <div class="form-group">
                <label for="carrera">Carrera</label>
                <input type="text" class="form-control border border-success" id="carrera" placeholder="Ingrese la carrera del estudiante" name="carrera">
              </div>
              <div class="form-group">
                <label for="testimonio">Testimonio</label>
                <textarea class="form-control border border-success" rows="3" id="testimonio" placeholder="Ingresa la Descripción" name="testimonio"></textarea>
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
                <button type="submit" class="btn btn-success btn-block" id="btn-add">Guardar Datos</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>