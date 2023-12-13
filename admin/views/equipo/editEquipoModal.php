<div class="modal fade" id="editEquipoModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Editar Profecionista</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-warning border border-warning">
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formEditEquipo" action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id_usuE" name="id_usu">
                            <input type="hidden" id="id_eqE" name="id_eq">
                            <input type="hidden" id="img_bd" name="img_bd">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control border border-warning" id="nombreE" placeholder="Ingrese nombre" name="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="puesto">Puesto</label>
                                            <input type="text" class="form-control border border-warning" id="puestoE" placeholder="Ingresa el puesto" name="puesto">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label id="imgName"></label>
                                        <div class="form-group">
                                            <label for="img_url">Imagen</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input is-warning" id="img_urlE" name="img_url">
                                                    <label class="custom-file-label" for="img_urlE">Seleccione la imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rFace">Facebook</label>
                                            <input type="text" class="form-control border border-warning" id="rFaceE" placeholder="Ingresa el Link de Facebook" name="rFace">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="rTw">Twitter</label>
                                            <input type="text" class="form-control border border-warning" id="rTwE" placeholder="Ingresa el Link de Twitter" name="rTw">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="rIns">Instagram</label>
                                            <input type="text" class="form-control border border-warning" id="rInsE" placeholder=" el Link de Instagram" name="rIns">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-block" id="btnAddEquipo">Editar Profecionista</button>
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