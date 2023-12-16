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
                 <form action="#" method="post" enctype="multipart/form-data" id="formEditImg">
                     <input type="hidden" id="id_usuUp" name="id_usu">
                     <input type="hidden" id="id_sliderUp" name="id_slider">
                     <input type="hidden" id="img1Bd" name="img1Bd">
                     <input type="hidden" id="img2Bd" name="img2Bd">
                     <div class="form-group">
                         <label for="img1Up">Imagen principal</label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input is-valid inform" id="img1Up" name="img1">
                                 <label class="custom-file-label" for="img1Up">Seleccione la imagen</label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <label id="img1Tit"></label>
                     </div>
                     <div class="form-group">
                         <label>Datos a mostrar de la imagen principal</label>
                     </div>
                     <div class="form-group">
                         <label for="tit1Up">Título</label>
                         <input type="text" class="form-control border border-success" id="tit1Up" placeholder="Ingrese el título" name="tit1">
                     </div>
                     <div class="form-group">
                         <label for="desc1Up">Descripción</label>
                         <input type="text" class="form-control border border-success" id="desc1Up" placeholder="Ingrese descripción" name="desc1">
                     </div>
                     <div class="form-group">
                         <label>Link del botón</label>
                         <select class="form-control border border-success" id="sLink1Up" name="sLink1">
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
                     <div class="form-group" id="otroLink1Up" style="display: none;">
                         <label for="link1Up">Link fuera del sitio</label>
                         <input type="text" class="form-control border border-success" id="link1Up" placeholder="Ingrese el link" name="link1">
                     </div>
                     <hr class="mt-4">
                     <div class="form-group">
                         <label for="img2Up">Imagen secundaria</label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input is-valid inform" id="img2Up" name="img2">
                                 <label class="custom-file-label" for="img2Up">Seleccione la imagen</label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <label id="img2Tit"></label>
                     </div>
                     <div class="form-group">
                         <label>Datos a mostrar de la imagen secundaria</label>
                     </div>
                     <div class="form-group">
                         <label for="tit2Up">Título</label>
                         <input type="text" class="form-control border border-success" id="tit2Up" placeholder="Ingrese el título" name="tit2">
                     </div>
                     <div class="form-group">
                         <label for="desc2Up">Descripción</label>
                         <input type="text" class="form-control border border-success" id="desc2Up" placeholder="Ingrese descripción" name="desc2">
                     </div>
                     <div class="form-group">
                         <label>Link del botón</label>
                         <select class="form-control border border-success" id="sLink2Up" name="sLink2">
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
                     <div class="form-group" id="otroLink2Up" style="display: none;">
                         <label for="link1Up">Link fuera del sitio</label>
                         <input type="text" class="form-control border border-success" id="link2Up" placeholder="Ingrese el link" name="link2">
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-warning btn-block" id="btnEditImg" name="btnEditImg">Guardar Cambios</button>
                     </div>
                 </form>
             </div>
         </div>