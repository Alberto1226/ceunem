<div class="modal fade" id="deleteTestModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Testimonio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-danger border border-danger">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formDelTest" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label>¿Estás seguro de eliminar?</label>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <img id="imagen" width="80%">
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-control" id="lNombre"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control" id="lCarrera"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control" id="lDescripcion" style="height: 100%;"></label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="id_tesD" name="id_tes">
                                <input type="hidden" id="id_usuD" name="id_usu">
                                <input type="hidden" id="img_urlD" name="img_delete">
                                <button type="submit" class="btn btn-danger btn-block" id="btn-de">Eliminar Profesionista</button>
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