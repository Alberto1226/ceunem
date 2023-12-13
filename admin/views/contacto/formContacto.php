<form action="#" method="post" id="formContacto">
    <div class="row">
        <div class="col-4">
        <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="nCompleto" name="nCompleto" value="1">
                    <label class="form-check-label">Nombre Completo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="nombre" name="nombre" value="1">
                    <label class="form-check-label">Nombre</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="apellidos" name="apellidos" value="1">
                    <label class="form-check-label">Apellido</label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="email" name="email" value="1">
                    <label class="form-check-label">Email</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="tel" name="tel" value="1">
                    <label class="form-check-label">Teléfono</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="face" name="face" value="1">
                    <label class="form-check-label">Facebook</label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="mensaje" name="mensaje" value="1">
                    <label class="form-check-label">Mensaje</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="asunto" name="asunto" value="1">
                    <label class="form-check-label">Asunto</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input inputCheck" type="checkbox" id="live" name="live" value="1">
                    <label class="form-check-label">De donde se comunican</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" id="btnInputsContac" name="btnInputsContac">Guardar Configuración</button>
    </div>
</form>