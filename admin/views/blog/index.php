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
            <div class="card-header ">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addBlogModal">
                    <i class="fa fa-plus"> Nuevo Artículo</i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'models/clases/articulo.php';
                        foreach ($this->articulos as $row) {
                            $articulo = new Articulo();
                            $articulo = $row;
                        ?>
                            <tr>
                                <td class="align-middle"><?php echo $articulo->categoria; ?></td>
                                <td class="align-middle" width="150px"><?php echo $articulo->titulo; ?></td>
                                <td class="align-middle" width="225px"><?php echo $articulo->descripcion; ?></td>
                                <td class="align-middle"><img src="<?php echo $articulo->img_url; ?>" alt="" width="80px"></td>
                                <td class="align-middle" width="80px"><?php echo $articulo->link_url; ?></td>
                                <td class="align-middle">
                                    <?php
                                    if ($articulo->estado == 1) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?>
                                </td>
                                <td class="align-middle">
                                    <div class="col-auto" style="display: inline-block;">
                                        <a class="btn btn-outline-warning" data-toggle="modal" data-target="#updateBlogModal<?= $articulo->id_blog; ?>"><i class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteBlogModal<?= $articulo->id_blog; ?>"><i class="fa fa-trash"></i></a>
                                        <?php
                                        if ($articulo->estado == 1) {
                                        ?>
                                            <a class="btn btn-outline-dark" data-toggle="modal" data-target="#statusBlogModal<?= $articulo->id_blog; ?>"><i class="fa fa-arrow-down"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#statusBlogModal<?= $articulo->id_blog; ?>"><i class="fa fa-arrow-up"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <!-- comienza modal editar -->
                            <div class="modal fade" id="updateBlogModal<?= $articulo->id_blog; ?>" tabindex="-1" aria-labelledby="updateBlogModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Artículo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-warning border border-warning">
                                                <div class="card-body">
                                                    <div class="text-bg-success p-3"><?php echo $this->mensaje; ?></div>
                                                    <!-- form start -->
                                                    <form id="updateBlog" action="<?php echo constant('URL'); ?>blog/updateArticulo" method="POST" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input type="hidden" class="form-control" id="id_blog_up" value="<?= $articulo->id_blog; ?>" name="id_blog_up">
                                                            <input type="hidden" class="form-control" id="img_url_db" value="<?= $articulo->img_url; ?>" name="img_url_db">
                                                            <div class="form-group">
                                                                <label for="categoria_up">Categoría</label>
                                                                <input type="text" class="form-control border border-warning" id="categoria_up" placeholder="Ingrese la Categoría" name="categoria_up" value="<?php echo $articulo->categoria; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="titulo_up">Título artículo</label>
                                                                <input type="text" class="form-control border border-warning" id="titulo_up" placeholder="Ingresa el Título" name="titulo_up" value="<?php echo $articulo->titulo; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="descripcion_up">Descripción</label>
                                                                <textarea class="form-control border border-warning" rows="3" id="descripcion_up" placeholder="Ingresa la Descripción" name="descripcion_up"><?php echo $articulo->descripcion; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="img_url_up">Imagen</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input border is-warning" id="img_url_up" name="img_url_up" value="<?php echo $articulo->img_url; ?>">
                                                                        <label class="custom-file-label" for="img_url_up">Seleccione la imagen</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="link_url_up">Link del Artículo</label>
                                                                <input type="text" class="form-control border border-warning" id="link_url_up" placeholder="Ingrese el link" name="link_url_up" value="<?php echo $articulo->link_url; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-warning btn-block" id="btn-up">Actualiazar Artículo</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- termina modal editar -->

                            <!-- comienza modal eliminar -->
                            <div class="modal fade" id="deleteBlogModal<?= $articulo->id_blog; ?>" tabindex="-1" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Eliminar Artículo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-danger border border-danger">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <!-- form start -->
                                                    <div class="form-group text-center">
                                                        <label>¿Estás seguro de eliminar este Artículo?</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Categoría: <?php echo $articulo->categoria; ?></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Título artículo: <?php echo $articulo->titulo; ?></label>
                                                    </div>
                                                    <form id="delteBlog" action="<?php echo constant('URL'); ?>blog/deleteArticulo" method="POST" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input type="hidden" class="form-control" id="id_delete" value="<?= $articulo->id_blog; ?>" name="id_delete">
                                                            <input type="hidden" class="form-control" id="img_delete" value="<?= $articulo->img_url; ?>" name="img_delete">
                                                            <button type="submit" class="btn btn-danger btn-block" id="btn-de">Eliminar Artículo</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- termina modal eliminar -->

                            <!-- comienza modal estado -->
                            <div class="modal fade" id="statusBlogModal<?= $articulo->id_blog; ?>" tabindex="-1" aria-labelledby="statusBlogModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Status Artículo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                if ($articulo->estado == 1) {
                                            ?>
                                            <div class="card card-dark border border-dark">
                                            <?php        
                                                }else{
                                            ?>
                                            <div class="card card-primary border border-primary">
                                            <?php        
                                                } 
                                            ?>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <!-- form start -->
                                                    <div class="form-group text-center">
                                                        <?php
                                                            if($articulo->estado == 1){
                                                        ?>
                                                        <label>¿Deseas desactivar este Árticulo?</label>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <label>¿Deseas activar este Árticulo?</label>
                                                        <?php        
                                                            } 
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Categoría: <?php echo $articulo->categoria; ?></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Título artículo: <?php echo $articulo->titulo; ?></label>
                                                    </div>
                                                    <form id="statusBlog" action="<?php echo constant('URL'); ?>blog/statusArticulo" method="POST" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input type="hidden" class="form-control" id="id_estado" value="<?= $articulo->id_blog; ?>" name="id_estado">
                                                            <input type="hidden" class="form-control" id="estado" value="<?= $articulo->estado; ?>" name="estado">
                                                            <?php
                                                            if ($articulo->estado == 1) {
                                                            ?>
                                                            <button type="submit" class="btn btn-dark btn-block" id="btn-de">Dar de Baja</button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-primary btn-block" id="btn-de">Dar de Alta</button>
                                                            <?php
                                                            }
                                                            
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- termina modal estado -->
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Categoría</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<?php require 'views/templete/footer.php'; ?>
<?php include 'addBlogModal.php'; ?>