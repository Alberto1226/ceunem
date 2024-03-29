<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Configuración para la entrada y salida de correos</h3>
        <div class="card-tools">
            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post" id="formSMTP">
            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
            <div class="form-group">
                <label for="dirServer">Dirección del Servidor SMTP</label>
                <input type="text" class="form-control border border-success" id="dirServer" placeholder="Ingresa Nombre Completo" name="dirServer">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre a mostrar</label>
                <input type="text" class="form-control border border-success" id="nombre" placeholder="Ingrese su Teléfono" name="nombre">
            </div>
            <div class="form-group">
                <label for="email">Dirección de Correo</label>
                <input type="text" class="form-control border border-success" id="email" placeholder="Ingrese su Teléfono" name="email">
            </div>
            <div class="form-group">
                <label for="pass" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control border border-success" id="pass" placeholder="Contraseña" name="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span>
                                <i class="fas fa-eye" id="show-password" style="font-size: 1.2rem; cursor: pointer;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="portServer">Puerto del Servidor SMTP</label>
                        <input type="text" class="form-control border border-success" id="portServer" placeholder="Ingrese su Email" name="portServer">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Conexión SMTP</label>
                        <select class="form-control border border-success" id="conect" name="conect">
                            <option>Seleccione una opción</option>
                            <option value="TLS">TLS</option>
                            <option value="STARTTLS">STARTTLS</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btnSMTP" name="btnSMTP">Enviar</button>
            </div>
        </form>
    </div>
</div>