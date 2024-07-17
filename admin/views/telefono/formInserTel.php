<form id="formInserTel" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
    <div class="form-group">
        <label for="numero">Número de Whatsapp</label>
        <input type="text" class="form-control border border-success" id="numero" placeholder="Ingrese tu número"
            name="numero">
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control border border-success" rows="2" id="mensaje" placeholder="Ingresa el mensaje"
            name="mensaje"></textarea>
    </div>
    <div class="form-group">
        <label for="link_facebook">Link Facebook</label>
        <input type="text" class="form-control border border-success" id="link_facebook"
            placeholder="Ingrese el link de Facebook" name="link_facebook">
    </div>

    <div class="form-group">
        <label for="link_instagram">Link Instagram</label>
        <input type="text" class="form-control border border-success" id="link_instagram"
            placeholder="Ingrese el link de Instagram" name="link_instagram">
    </div>

    <div class="form-group">
        <label for="domicilio1">Domicilio 1</label>
        <input type="text" class="form-control border border-success" id="domicilio1"
            placeholder="Ingrese el domicilio 1" name="domicilio1">
    </div>

    <div class="form-group">
        <label for="domicilio2">Domicilio 2</label>
        <input type="text" class="form-control border border-success" id="domicilio2"
            placeholder="Ingrese el domicilio 2" name="domicilio2">
    </div>

    <div class="form-group">
        <label for="leyenda">Leyenda</label>
        <input type="text" class="form-control border border-success" id="leyenda" placeholder="Ingrese la leyenda"
            name="leyenda">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" id="btn-tel">Agregar Telefono</button>
    </div>
</form>