<div class="modal fade" id="addBlogModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Noticia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
          <!-- form start -->
          <form id="addBlog" action="<?php echo constant('URL'); ?>blog/insertArticulo" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" id="categoria" placeholder="Ingrese la Categoría" name="categoria">
              </div>
              <div class="form-group">
                <label for="titulo">Título artículo</label>
                <input type="text" class="form-control" id="titulo" placeholder="Ingresa el Título" name="titulo">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion">
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
                <label for="link_url">Link del Artículo</label>
                <input type="text" class="form-control" id="link_url" placeholder="Ingrese el link" name="link_url">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" id="btn-add">Agregar Artículo</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>