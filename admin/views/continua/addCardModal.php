<div class="modal fade " id="addCardEcModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-success border border-success">
                    <div class="card-body">
                        <!-- form start -->
                        <form id="modalCard" action="<?php echo constant('URL'); ?>continua/addCard" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div>
                                    <label for="titulo">Titulo</label>
                                    <input type="text" class="form-control border border-success" id="titulo" value="" placeholder="Ingrese el titulo" name="titulo">
                                    <input type="text" class="form-control border border-success" hidden="true" id="id_ec" value="" name="id_ec">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control border border-success" rows="3" id="descripcion" placeholder="Ingresa la Descripción" name="descripcion"></textarea>
                                    <label for="img_url">Imagen</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input is-success" require id="img_url" value="" name="img_url">
                                            <label class="custom-file-label" for="img_url">Seleccione la imagen</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-block" id="btn-add">Agregar Card</button>
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