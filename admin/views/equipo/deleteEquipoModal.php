<div class="modal fade" id="deleteEquipoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Profesionista</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-danger border border-danger">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="formDelEquipo" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label>¿Estás seguro de eliminar a?</label>
                                </div>
                                <div class="form-group">
                                    <label class="form-control" id="lName"></label>
                                </div>
                                <div class="form-group">
                                    <label class="form-control" id="lPuesto"></label>
                                </div>
                                <input type="hidden" id="id_eqD" value="" name="id_eq">
                                <input type="hidden" id="id_usuD" value="" name="id_usu">
                                <input type="hidden" id="img_delete" value="" name="img_delete">
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