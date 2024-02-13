<?php
require_once 'libs/controller.php';
class Cursos extends Controller
{
    function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        parent::__construct();

        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render()
    {
        $cursos = $this->model->getAllCursos();
        $this->view->cursos = $cursos;
        $this->view->render('cursos/index');
    }

    function addCursos()
    {
        $nom_curso = $_POST['nom_curso'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";


        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/cursos/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_img;  

        if($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf"){
            $rImg = $dirImg . $nom_img;
            $rPdf = $dirPdf . $nom_pdf;
            if(move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)){
                if($this->model->insert([
                    'nom_curso' =>$nom_curso,
                    'descripcion' =>$descripcion,
                    'img_url' =>$rImg,
                    'pdf_url' =>$rPdf,
                    'estado' =>$estado
                ])){
                    $this->view->mensaje = "Se agrego correctamente";
                    
                } 
                header('location: ' . URL . 'cursos');
            }else{
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        }else{
            $this->view->mensaje =  "El formato es incorrecto";
        }

    }

    function updateCur()
    {
        $id_curso = $_POST['id_curso_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_curso = $_POST['nom_curso_up'];
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
                        'id_curso' => $id_curso,
                        'nom_curso' => $nom_curso,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $cursos = new Cursos();
                        $cursos->id_curso = $id_curso;
                        $cursos->nom_curso = $nom_curso;
                        $cursos->descripcion = $descripcion;
                        $cursos->img_url = $img_url;
                        $cursos->pdf_url = $pdf_url;

                        $this->view->maestria = $cursos;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'cursos');
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
                'id_curso' => $id_curso,
                'nom_curso' => $nom_curso,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $cursos = new Cursos();
                $cursos->id_curso = $id_curso;
                $cursos->nom_curso = $nom_curso;
                $cursos->descripcion = $descripcion;
                $cursos->img_url = $img_url_db;
                $cursos->pdf_url = $pdf_url_db;

                $this->view->maestria = $cursos;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }

    function deleteCur()
    {
        $id_curso = $_POST['id_delete'];
        $img_url = $_POST['img_delete'];
        $pdf_url = $_POST['pdf_delete'];

        if (unlink($img_url) && unlink($pdf_url)) {
            if ($this->model->delete($id_curso)) {
                $this->view->mensaje = "Maestría eliminada correctamente";
            }
            header('location: ' . URL . 'cursos');
        } else {
            $this->view->mensaje = "Error al eliminar la Maestría";
        }
    }

    function statusCur()
    {
        $id_curso = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_curso' => $id_curso,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'cursos');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_curso' => $id_curso,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'cursos');
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
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'cursos');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->updateEncabezado($editar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'cursos');
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
