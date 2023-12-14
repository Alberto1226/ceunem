<?php
require_once 'libs/controller.php';
class Maestria extends Controller{
    function __construct()
    {
        session_start();
        parent::__construct();

        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render(){
        $maestrias = $this->model->getAllMaestrias();
        $this->view->maestrias = $maestrias;
        $this->view->render('maestria/index');
    }

    function addMaestria()
    {
        $nom_mas = $_POST['nom_mas'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/maestria/";


        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/maestria/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_img;

        if($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf"){
            if(move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)){
                if($this->model->insert([
                    'nom_mas' =>$nom_mas,
                    'descripcion' =>$descripcion,
                    'img_url' =>$rImg,
                    'pdf_url' =>$rPdf,
                    'estado' =>$estado
                ])){
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'maestria');
            }else{
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        }else{
            $this->view->mensaje = "El formato es incorrecto";
        }

    }

    function updateMaestria()
    {
        $id_mas = $_POST['id_mas_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_mas = $_POST['nom_mas_up'];
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
                        'id_mas' => $id_mas,
                        'nom_mas' => $nom_mas,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $maestria = new Maestrias();
                        $maestria->id_mas = $id_mas;
                        $maestria->nom_mas = $nom_mas;
                        $maestria->descripcion = $descripcion;
                        $maestria->img_url = $img_url;
                        $maestria->pdf_url = $pdf_url;

                        $this->view->maestria = $maestria;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'maestria');
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
                'id_mas' => $id_mas,
                'nom_mas' => $nom_mas,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $maestria = new Maestrias();
                $maestria->id_mas = $id_mas;
                $maestria->nom_mas = $nom_mas;
                $maestria->descripcion = $descripcion;
                $maestria->img_url = $img_url_db;
                $maestria->pdf_url = $pdf_url_db;

                $this->view->maestria = $maestria;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'maestria');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }

    function deleteMaestria()
    {
        $id_mas = $_POST['id_delete'];
        $img_url = $_POST['img_delete'];
        $pdf_url = $_POST['pdf_delete'];

        if (unlink($img_url) && unlink($pdf_url)) {
            if ($this->model->delete($id_mas)) {
                $this->view->mensaje = "Maestría eliminada correctamente";
            }
            header('location: ' . URL . 'maestria');
        } else {
            $this->view->mensaje = "Error al eliminar la Maestría";
        }
    }

    function statusMaestria()
    {
        $id_mas = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_mas' => $id_mas,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'maestria');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'maestria');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_mas' => $id_mas,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'maestria');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'maestria');
            }
        }
    }

}

?>