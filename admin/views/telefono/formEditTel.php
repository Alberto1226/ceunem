<form id="formEditTel" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="id_tel2" name="id_tel">
    <input type="hidden" id="id_usu2" name="id_usu">
    <div class="form-group">
        <label for="numero">Número de Whatsapp</label>
        <input type="text" class="form-control border border-success" id="numero2" placeholder="Ingrese tu número"
            name="numero">
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control border border-success" rows="2" id="mensaje2" placeholder="Ingresa el mensaje"
            name="mensaje"></textarea>
    </div>
    <hr/>
    <div class="form-group">
        <label for="link_facebook">Link Facebook</label>
        <input type="text" class="form-control border border-success" id="link_facebook2"
            placeholder="Ingrese el link de Facebook" name="link_facebook">
    </div>

    <div class="form-group">
        <label for="link_instagram">Link Instagram</label>
        <input type="text" class="form-control border border-success" id="link_instagram2"
            placeholder="Ingrese el link de Instagram" name="link_instagram">
    </div>

    <div class="form-group">
        <label for="domicilio1">Domicilio 1</label>
        <input type="text" class="form-control border border-success" id="domicilio12"
            placeholder="Ingrese el domicilio 1" name="domicilio1">
    </div>

    <div class="form-group">
        <label for="domicilio2">Domicilio 2</label>
        <input type="text" class="form-control border border-success" id="domicilio22"
            placeholder="Ingrese el domicilio 2" name="domicilio2">
    </div>

    <div class="form-group">
        <label for="leyenda">Leyenda</label>
        <input type="text" class="form-control border border-success" id="leyenda2" placeholder="Ingrese la leyenda"
            name="leyenda">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block" id="btn-tel">Agregar Telefono</button>
    </div>
</form>