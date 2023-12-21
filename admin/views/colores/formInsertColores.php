<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Estilos de tu página</h3>
        <div class="card-tools">
            <button type="submit" class="btn btn-tools" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post" id="formInsertColores">
            <input type="hidden" id="id_usu" value="<?php echo $_SESSION['id_usu'] ?>" name="id_usu">
            <hr class="mt-3 mb-3 border border-success">
            <div class="form-group text-center">
                <label>Menú y Pie de páginia</label>
            </div>
            <hr class="mt-3 mb-3 border border-success">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="fondo_hf">Color de fondo</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="fondo_hf" name="fondo_hf">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dfondo_hf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="let_hf">Color de letra</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="let_hf" name="let_hf">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dlet_hf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="let_hover">Color del efecto hover para letra</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="let_hover" name="let_hover">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dlet_hover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3 border border-success">
            <div class="form-group text-center">
                <label>Botones</label>
            </div>
            <hr class="mt-3 mb-3 border border-success">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="btn_color">Color de fondo</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="btn_color" name="btn_color">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dbtn_color"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="btn_hover">Color de fondo al pasar el Mouse</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="btn_hover" name="btn_hover">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dbtn_hover"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="btn_font">Color de letra</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="btn_font" name="btn_font">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dbtn_font"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="btn_hover">Color de letra al pasar el Mouse</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="btn_hfont" name="btn_hfont">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dbtn_hfont"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3 border border-success">
            <div class="form-group text-center">
                <label>Resto de la pagina</label>
            </div>
            <hr class="mt-3 mb-3 border border-success">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="background">Color de fondo del resto de la página</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="background" name="background">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dbackground"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="font">Color de la letra del resto de la página</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="color" class="form-control border border-success" id="font" name="font">
                            </div>
                            <div class="col-3">
                                <div class="" style="height: 100%; width: 100%;" id="Dfont"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btninsertColors" name="btninsertColors">Guardar Colores</button>
            </div>
        </form>
    </div>
</div>