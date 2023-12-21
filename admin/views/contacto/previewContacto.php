<style>
    .inform,
    .titInput {
        display: none;
    }
</style>

<div class="card card-default mt-3">
    <div class="card-header">
        <h3 class="card-title">Vista previa del formulario</h3>
        <div class="card-tools">
            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post">
            <div class="form-group">
                <label for="nombreCompleto" class="titInput" id="nCompletoL">Nombre Completo</label>
                <input type="text" class="form-control inform" id="nCompletoF" placeholder="Ingresa Nombre Completo" name="nCompleto">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre" class="titInput" id="nombreL">Nombre(s)</label>
                        <input type="text" class="form-control inform" id="nombreF" placeholder="Ingresa Nombre(s)" name="nombre">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="apellidos" class="titInput" id="apellidosL">Apellidos</label>
                        <input type="text" class="form-control inform" id="apellidosF" placeholder="Ingresa Apellidos" name="apellidos">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="titInput" id="emailL">Email</label>
                <input type="text" class="form-control inform" id="emailF" placeholder="Ingrese su Email" name="email">
            </div>
            <div class="form-group">
                <label for="tel" class="titInput" id="telL">Teléfono</label>
                <input type="text" class="form-control inform" id="telF" placeholder="Ingrese su Teléfono" name="tel">
            </div>
            <div class="form-group">
                <label for="face" class="titInput" id="faceL">Facebook</label>
                <input type="text" class="form-control inform" id="faceF" placeholder="Ingrese su link del perfil" name="face">
            </div>
            <div class="form-group">
                <label for="live" class="titInput" id="liveL">De donde comunica</label>
                <input type="text" class="form-control inform" id="liveF" placeholder="Ingrese el estado de donde se comunica" name="live">
            </div>
            <div class="form-group">
                <label for="asunto" class="titInput" id="asuntoL">Asunto</label>
                <input type="text" class="form-control inform" id="asuntoF" placeholder="Ingrese el Asunto" name="asunto">
            </div>
            <div class="form-group">
                <label for="mensaje" class="titInput" id="mensajeL">Mensaje</label>
                <textarea class="form-control inform" rows="2" id="mensajeF" placeholder="Ingrese su mensaje" name="mensaje"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" disabled id="btnInputsContac" name="btnInputsContac">Enviar</button>
            </div>
        </form>
    </div>
</div>