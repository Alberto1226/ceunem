<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo constant('URL') ?>panel">Home</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="col-auto">
        <h4 class="modal-title">Editar Noticia</h4>
          <div class="text-bg-success p-3"><?php echo $this->mensaje; ?></div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form id="addBlog" action="<?php echo constant('URL'); ?>blog/insertArticulo" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="idBlog" name="idBlog" value="<?php echo $this->articulo->id_blog; ?>">
          <div class="card-body">
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <input type="text" class="form-control" id="categoria" placeholder="Ingrese la Categoría" name="categoria" value="<?php echo $this->articulo->categoria; ?>">
            </div>
            <div class="form-group">
              <label for="titulo">Título artículo</label>
              <input type="text" class="form-control" id="titulo" placeholder="Ingresa el Título" name="titulo" value="<?php echo $this->articulo->titulo; ?>">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion" value="<?php echo $this->articulo->descripcion; ?>">
            </div>
            <div class="form-group">
                  <label for="descripcion">Blog Completo</label>
                  <textarea class="form-control border border-success" rows="3" id="blogCompleto" placeholder="Máximo 10000 caracteres" name="blogCompleto" value="<?php echo $this->articulo->blogCompleto; ?>"></textarea>
                </div>
            <div class="form-group">
              <label for="img_url">Imagen</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="img_url" name="img_url" value="<?php echo $this->articulo->img_url; ?>">
                  <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="link_url">Link del Artículo</label>
              <input type="text" class="form-control" id="link_url" placeholder="Ingrese el link" name="link_url" value="<?php echo $this->articulo->link_url; ?>">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="btn-add">Agregar Artículo</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
<?php
require 'views/templete/footer.php';
?>