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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBlogModal">
                        <i class="fa fa-plus"> Nuevo Blog</i>
                    </button>
                    <div class="text-bg-success p-3"><?php echo $this->mensaje; ?></div>
                </div>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'models/articulo.php';
                        foreach ($this->articulos as $row) {
                            $articulo = new Articulo();
                            $articulo = $row;
                        ?>
                            <tr>
                                <td><?php echo $articulo->categoria; ?></td>
                                <td><?php echo $articulo->titulo; ?></td>
                                <td width="350px"><?php echo $articulo->descripcion; ?></td>
                                <td><img src="<?php echo $articulo->img_url; ?>" alt="" width="80"></td>
                                <td><?php echo $articulo->link_url; ?></td>
                                <td>
                                    <div class="col-auto" style="display: inline-block;">
                                        <a class="btn btn-info" href="<?php echo constant('URL').'blog/getArticulo/'.$articulo->id_blog; ?>"><i class="fa fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBlogModal">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Categoría</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Link</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<?php
include 'addBlogModal.php';
include 'deleteBlogModal.php';

require 'views/templete/footer.php'; 
?>