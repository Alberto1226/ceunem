<div class="modal fade" id="addEquipoModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Profecionista</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-success border border-success">
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formInsertEquipo" action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control border border-success" id="nombre" placeholder="Ingrese nombre completo" name="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="puesto">Puesto</label>
                                            <input type="text" class="form-control border border-success" id="puesto" placeholder="Ingresa el puesto" name="puesto">
                                        </div>
                                    </div>
                                    <div class="col-6">
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
                                            <label for="rFace">Facebook</label>
                                            <input type="text" class="form-control border border-success" id="rFace" placeholder="Ingresa el Link" name="rFace">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="rTw">Twitter</label>
                                            <input type="text" class="form-control border border-success" id="rTw" placeholder="Ingresa el Link" name="rTw">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="rIns">Instagram</label>
                                            <input type="text" class="form-control border border-success" id="rIns" placeholder="Ingresa el Link" name="rIns">
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
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block" id="btnAddEquipo">Agregar Profecionista</button>
                    </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>