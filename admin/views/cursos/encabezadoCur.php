<div class="card card-default mt-3">
    <div class="card-header">
        <h3 class="card-title">Encabezado </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="#" method="post" id="formEnCurso">
    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
    <input type="hidden" id="id_en" name="id_en">
    <input type="hidden" id="encabezado" name="encabezado" value="Cursos">
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control border border-success" rows="3" id="descripcion" placeholder="Ingresa el texto que se mostrara antes de tus Cursos" name="descripcion"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" id="btnEncabezado" name="btnEncabezado">Guardar Configuración</button>
    </div>
</form>
    </div>
</div>