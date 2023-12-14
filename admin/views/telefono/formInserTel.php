<form id="formInserTel" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
    <div class="form-group">
        <label for="numero">Número de Whatsapp</label>
        <input type="text" class="form-control border border-success" id="numero" placeholder="Ingrese el nombre de la Licenciatura" name="numero">
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control border border-success" rows="2" id="mensaje" placeholder="Ingresa la Descripción" name="mensaje"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" id="btn-tel">Agregar Telefono</button>
    </div>
</form>