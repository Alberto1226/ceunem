<?php
require_once 'libs/controller.php';
class Licenciatura extends Controller
{
    function __construct()
    {
        parent::__construct();
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

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/licenciatura/";


        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/licenciatura/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_img;  

        if($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf"){
            $rImg = $dirImg . $nom_img;
            $rPdf = $dirPdf . $nom_pdf;
            if(move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)){
                if($this->model->insertLicenciatura([
                    'nom_lic' =>$nom_lic,
                    'descripcion' =>$descripcion,
                    'img_url' =>$rImg,
                    'pdf_url' =>$rPdf,
                    'estado' =>$estado
                ])){
                    $this->view->mensaje = "Se agrego correctamente";
                    
                }
                header('location: ' . URL . 'licenciatura');
            }else{
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        }else{
            $this->view->mensaje =  "El formato es incorrecto";
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

}
