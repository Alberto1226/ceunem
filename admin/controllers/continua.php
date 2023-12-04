<?php
require_once 'libs/controller.php';
class Continua extends Controller
{
    function __construct()
    {
        parent::__construct();

        session_start();
        if(empty($_SESSION['login'])){
            header('Location: '.URL.'login');
            die();
        }
    }

    function render()
    {
        $continuas = $this->model->getAllContinuas();
        $this->view->continuas = $continuas;
        $this->view->render('continua/index');
    }

    function addPrograma()
    {
        $nom_ec = $_POST['nom_ec'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";


        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/continua/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_pdf;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf") {
            if (move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)) {
                if ($this->model->insert([
                    'nom_ec' => $nom_ec,
                    'descripcion' => $descripcion,
                    'img_url' => $rImg,
                    'pdf_url' => $rPdf,
                    'estado' => $estado,
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje = "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje = "El formato es incorrecto";
        }
    }

    function updatePrograma()
    {
        $id_ec = $_POST['id_ec_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_ec = $_POST['nom_ec_up'];
        $descripcion = $_POST['descripcion_up'];

        $img_url = $_FILES['img_url_up']['tmp_name'];
        $nom_img = $_FILES['img_url_up']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";


        $pdf_url = $_FILES['pdf_url_up']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url_up']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/continua/";

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
                        'id_ec' => $id_ec,
                        'nom_ec' => $nom_ec,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $continua = new Continuas();
                        $continua->id_ec = $id_ec;
                        $continua->nom_ec = $nom_ec;
                        $continua->descripcion = $descripcion;
                        $continua->img_url = $img_url;
                        $continua->pdf_url = $pdf_url;

                        $this->view->continua = $continua;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'continua');
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
                'id_ec' => $id_ec,
                'nom_ec' => $nom_ec,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $continua = new Continuas();
                $continua->id_ec = $id_ec;
                $continua->nom_ec = $nom_ec;
                $continua->descripcion = $descripcion;
                $continua->img_url = $img_url_db;
                $continua->pdf_url = $pdf_url_db;

                $this->view->continua = $continua;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }

    function deletePrograma()
    {
        $id_ec = $_POST['id_delete'];
        $img_url = $_POST['img_delete'];
        $pdf_url = $_POST['pdf_delete'];

        if (unlink($img_url) && unlink($pdf_url)) {
            if ($this->model->delete($id_ec)) {
                $this->view->mensaje = "Programa eliminado correctamente";
            }
            header('location: ' . URL . 'continua');
        } else {
            $this->view->mensaje = "Error al eliminar el programa";
        }
    }

    function statusPrograma()
    {
        $id_ec = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_ec' => $id_ec,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'continua');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_ec' => $id_ec,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'continua');
            }
        }
    }
}
