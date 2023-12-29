<div class="modal fade" id="statusTestModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Status Testimonio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary border border-primary" id="divCard">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formStatusTest" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label id="titModal"></label>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <img id="imagenS" width="80%">
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-control" id="lNombreS"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control" id="lCarreraS"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control" id="lDescripcionS" style="height: 100%;"></label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="id_tesS" name="id_tes">
                                <input type="hidden" id="id_usuS" name="id_usu">
                                <input type="hidden" id="estado" name="estado">
                                <button type="submit" class="btn btn-primary btn-block" id="btnStatus"></button>
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