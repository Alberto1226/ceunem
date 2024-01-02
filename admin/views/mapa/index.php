<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-outline card-success">
            <div class="card-header">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h1>Mapa</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?php echo constant('URL') ?>panel">Home</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body">
                <div class="card card-default mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Agrega tu ubicación</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="#" method="post" id="formMaps">
                            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
                            <input type="hidden" id="id_mapa" name="id_mapa">
                            <div class="form-group">
                                <label for="mapa">Mapa</label>
                                <textarea class="form-control border border-success" rows="5" id="mapa" placeholder="Ingresa el iframe de tu ubicación" name="mapa"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block" id="btnMapa" name="btnMapa">Guardar Ubicación</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-default mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Vista Previa </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container-xxl py-5">
                            <div class="container">
                                <div id="divMapa"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo constant('URL') ?>assets/js/formInsertMapa.js"></script>
<?php require 'views/templete/footer.php'; ?>