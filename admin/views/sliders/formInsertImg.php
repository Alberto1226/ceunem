<div class="card card-default">
    <div class="card-body">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Las imagenes colocados en esta sección iran en la parte incial de su página</h3>
                <div class="card-tools">
                    <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data" id="formInsertImg">
                    <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
                    <div class="form-group">
                        <label for="img1">Imagen principal</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input is-valid inform" id="img1" name="img1" onchange="imgSlider(event, '#img1')">
                                <label class="custom-file-label" for="img1">Seleccione la imagen</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Datos a mostrar de la imagen principal</label>
                    </div>
                    <div class="form-group">
                        <label for="tit1">Título</label>
                        <input type="text" class="form-control border border-success" id="tit1" placeholder="Ingrese el título" name="tit1">
                    </div>
                    <div class="form-group">
                        <label for="desc1">Descripción</label>
                        <input type="text" class="form-control border border-success" id="desc1" placeholder="Ingrese descripción" name="desc1">
                    </div>
                    <div class="form-group">
                         <label>Link del botón</label>
                         <select class="form-control border border-success" id="sLink1" name="sLink1">
                             <option>Seleccione una opción</option>
                             <option value="inicio">Inicio</option>
                             <option value="nosotros">Nosotros</option>
                             <option value="blog">Blog</option>
                             <option value="licenciatura">Licenciaturas</option>
                             <option value="maestria">Maestrias</option>
                             <option value="continua">Educación Continua</option>
                             <option value="contacto">Contacto</option>
                             <option value="otro">Link fuera del sitio</option>
                         </select>
                     </div>
                     <div class="form-group" id="otroLink1" style="display: none;">
                         <label for="link1Up">Link fuera del sitio</label>
                         <input type="text" class="form-control border border-success" id="link1Up" placeholder="Ingrese el link" name="link1">
                     </div>
                    <hr class="mt-4">
                    <div class="form-group">
                        <label for="img2">Imagen secundaria</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input is-valid inform" id="img2" name="img2" onchange="imgSlider(event, '#img2')">
                                <label class="custom-file-label" for="img2">Seleccione la imagen</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Datos a mostrar de la imagen secundaria</label>
                    </div>
                    <div class="form-group">
                        <label for="tit2">Título</label>
                        <input type="text" class="form-control border border-success" id="tit2" placeholder="Ingrese el título" name="tit2">
                    </div>
                    <div class="form-group">
                        <label for="desc2">Descripción</label>
                        <input type="text" class="form-control border border-success" id="desc2" placeholder="Ingrese descripción" name="desc2">
                    </div>
                    <div class="form-group">
                         <label>Link del botón</label>
                         <select class="form-control border border-success" id="sLink2" name="sLink2">
                             <option>Seleccione una opción</option>
                             <option value="inicio">Inicio</option>
                             <option value="nosotros">Nosotros</option>
                             <option value="blog">Blog</option>
                             <option value="licenciatura">Licenciaturas</option>
                             <option value="maestria">Maestrias</option>
                             <option value="continua">Educación Continua</option>
                             <option value="contacto">Contacto</option>
                             <option value="otro">Link fuera del sitio</option>
                         </select>
                     </div>
                     <div class="form-group" id="otroLink2" style="display: none;">
                         <label for="link1Up">Link fuera del sitio</label>
                         <input type="text" class="form-control border border-success" id="link2Up" placeholder="Ingrese el link" name="link2">
                     </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" id="btnInsertImg" name="btnInsertImg">Guardar Imagenes</button>
                    </div>
                </form>
            </div>
        </div>