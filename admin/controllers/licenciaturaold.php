<?php
require_once 'libs/controller.php';
class Licenciatura extends Controller
{
    function __construct()
    {
        session_start();
        parent::__construct();

        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render()
    {
        $licenciaturas = $this->model->getAllLicenciaturas();
        $this->view->licenciaturas = $licenciaturas;
        $this->view->render('licenciatura/index');
    }

    function addLicenciatura()
{
    $nom_lic = $_POST['nom_lic'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $revoe = $_POST["revoe"];
    $descgral = $_POST["descgral"];

    // Imagen 1
    $img1 = $_FILES["img1"]["tmp_name"];
    $nom_img1 = $_FILES["img1"]["name"];
    $tImg1 = strtolower(pathinfo($nom_img1, PATHINFO_EXTENSION));
    $rImg1 = "public/img/licenciatura/" . date('Ymd_His') . "_" . $nom_img1;

    // Imagen 2
    $img2 = $_FILES["img2"]["tmp_name"];
    $nom_img2 = $_FILES["img2"]["name"];
    $tImg2 = strtolower(pathinfo($nom_img2, PATHINFO_EXTENSION));
    $rImg2 = "public/img/licenciatura/" . date('Ymd_His') . "_" . $nom_img2;

    // Imagen 3
    $img3 = $_FILES["img3"]["tmp_name"];
    $nom_img3 = $_FILES["img3"]["name"];
    $tImg3 = strtolower(pathinfo($nom_img3, PATHINFO_EXTENSION));
    $rImg3 = "public/img/licenciatura/" . date('Ymd_His') . "_" . $nom_img3;

    // PDF
    $pdf_url = $_FILES["pdf_url"]["tmp_name"];
    $nom_pdf = $_FILES["pdf_url"]["name"];
    $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
    $rPdf = "public/docs/licenciatura/" . date('Ymd_His') . "_" . $nom_pdf;

    if (
        ($tImg1 == "jpg" || $tImg1 == "jpeg" || $tImg1 == "png") &&
        ($tImg2 == "jpg" || $tImg2 == "jpeg" || $tImg2 == "png") &&
        ($tImg3 == "jpg" || $tImg3 == "jpeg" || $tImg3 == "png") &&
        ($tPdf == "pdf")
    ) {
        if (
            move_uploaded_file($img1, $rImg1) &&
            move_uploaded_file($img2, $rImg2) &&
            move_uploaded_file($img3, $rImg3) &&
            move_uploaded_file($pdf_url, $rPdf)
        ) {
            if ($this->model->insert([
                'nom_lic' => $nom_lic,
                'descripcion' => $descripcion,
                'img_url' => $rImg1, // Solo se guarda la ruta de la primera imagen
                'pdf_url' => $rPdf,
                'estado' => $estado,
                'img1' => $rImg1,
                'des1' => $_POST["des1"],
                'tit1' => $_POST["tit1"],
                'img2' => $rImg2,
                'des2' => $_POST["des2"],
                'tit2' => $_POST["tit2"],
                'img3' => $rImg3,
                'des3' => $_POST["des3"],
                'tit3' => $_POST["tit3"],
                'revoe' => $revoe,
                'descgral' => $descgral
            ])) {
                $this->view->mensaje = "Se agregó correctamente";
            }
            header('location: ' . URL . 'licenciatura');
        } else {
            $this->view->mensaje = "Error al guardar en el directorio";
        }
    } else {
        $this->view->mensaje = "El formato de los archivos es incorrecto";
    }
}


    function updateLic()
    {
        $id_lic = $_POST['id_lic_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_lic = $_POST['nom_lic_up'];
        $descripcion = $_POST['descripcion_up'];

        $img_url = $_FILES['img_url_up']['tmp_name'];
        $nom_img = $_FILES['img_url_up']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/maestria/";


        $pdf_url = $_FILES['pdf_url_up']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url_up']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/maestria/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_pdf;

        if (is_file($img_url) && is_file($pdf_url)) {
            if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf") {
                try {
                    unlink($img_url_db);
                    unlink($pdf_url_db);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                if (move_uploaded_file($img_url, $rImg) && move_uploaded_file($pdf_url, $rPdf)) {
                    if ($this->model->update([
                        'id_lic' => $id_lic,
                        'nom_lic' => $nom_lic,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $licenciatura = new Licenciaturas();
                        $licenciatura->id_lic = $id_lic;
                        $licenciatura->nom_lic = $nom_lic;
                        $licenciatura->descripcion = $descripcion;
                        $licenciatura->img_url = $img_url;
                        $licenciatura->pdf_url = $pdf_url;

                        $this->view->maestria = $licenciatura;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'licenciatura');
                    } else {
                        $this->view->mensaje = "Error al modificar";
                    }
                } else {
                    $this->view->mensaje = "Error al subir archivos";
                }
            } else {
                $this->view->mensaje = "Error al actulizar";
            }
        } else {
            if ($this->model->update([
                'id_lic' => $id_lic,
                'nom_lic' => $nom_lic,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $licenciatura = new Licenciaturas();
                $licenciatura->id_lic = $id_lic;
                $licenciatura->nom_lic = $nom_lic;
                $licenciatura->descripcion = $descripcion;
                $licenciatura->img_url = $img_url_db;
                $licenciatura->pdf_url = $pdf_url_db;

                $this->view->maestria = $licenciatura;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'licenciatura');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }

    function deleteLic()
    {
        $id_lic = $_POST['id_delete'];
        $img_url = $_POST['img_delete'];
        $pdf_url = $_POST['pdf_delete'];

        if (unlink($img_url) && unlink($pdf_url)) {
            if ($this->model->delete($id_lic)) {
                $this->view->mensaje = "Maestría eliminada correctamente";
            }
            header('location: ' . URL . 'licenciatura');
        } else {
            $this->view->mensaje = "Error al eliminar la Maestría";
        }
    }

    function statusLic()
    {
        $id_lic = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_lic' => $id_lic,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'licenciatura');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'licenciatura');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_lic' => $id_lic,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'licenciatura');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'licenciatura');
            }
        }
    }

    function addEncabezado(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $encabezado = $_POST['encabezado'];
            $descripcion = $_POST['descripcion'];
            $id_en = $_POST['id_en'];
            
            $ids = empty($id_en) ? $ids=false : $ids=true;

            $insertar =[
                'id_usu'=> $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
            ];

            $editar =[
                'id_usu'=> $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
                'id_en' => $id_en
            ];

            if($ids==false){
                if($this->model->insertEncabezado($insertar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'licenciatura');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->updateEncabezado($editar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'licenciatura');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            
        }
    }

    function getEncabezado(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $encabezado =  json_decode(file_get_contents('php://input'))->encabezado;
            $tabla = $this->model->getByEncabezado($encabezado);
            echo json_encode($tabla); 
        }
    }
}
