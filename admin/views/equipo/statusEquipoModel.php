<div class="modal fade" id="statusEquipoModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Status Profesionista</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary border border-primary" id="divCard">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formStatusEq" action="#" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label id="titModel"></label>
                                </div>
                                <div class="form-group">
                                    <label id="sNombre"></label>
                                </div>
                                <div class="form-group">
                                    <label id="sPuesto"></label>
                                </div>
                                <input type="hidden" class="form-control" id="sId_eq" name="id_eq">
                                <input type="hidden" class="form-control" id="sId_usu" name="id_usu">
                                <input type="hidden" class="form-control" id="sEstado" name="estado">
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