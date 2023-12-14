<?php
require_once 'libs/controller.php';
class Vision extends Controller
{
    public $id;

    function __construct()
    {
        session_start();
        parent::__construct();
        
        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
    }

    function render()
    {
        $id_usu = $this->id = $_SESSION['id_usu'];
        $fila = $this->model->countRow($id_usu);
        $this->view->fila = $fila;

        $tabla = $this->model->getV($id_usu);
        $this->view->tabla = $tabla;

        $this->view->render('vision/index');
    }

    function addVision()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_sec = $_FILES['img_sec']['tmp_name'];
            $id_usu = $_POST['id_usu'];
            $nom_sec = $_POST['nom_sec'];
            $desc_sec = $_POST['desc_sec'];

            $img_s = $_FILES['img_sec']['name'];
            $t_s = strtolower(pathinfo($img_s, PATHINFO_EXTENSION));

            $dir = "public/img/filosofia/";
            $fecha = date('Ymd_His');
            $r_v = $dir . "VIS_" . $fecha . "_" . $img_s;

            if (
                strlen($nom_sec) != 0 and strlen($desc_sec) != 0 and strlen($id_usu) != 0
                and strlen($img_sec) != 0 and $t_s == "jpg" or $t_s == "jpeg" or $t_s == "png"
            ) {
                if (move_uploaded_file($img_sec, $r_v)) {
                    if ($this->model->insert([
                        'nom_sec' => $nom_sec,
                        'img_sec' => $r_v,
                        'desc_sec' => $desc_sec,
                        'estado' => 1,
                        'id_usu' => $id_usu
                    ])) {
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => 'http://localhost/proyectos/ceunem/admin/vision'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al subir los datos.');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al subir imagen.');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Verifique los campos.');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function upVision()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_bd = $_POST['img_bd'];
            $id_vis = $_POST['id_vis'];
            $id_usu = $_POST['id_usu'];


            $img_sec = $_FILES['img_sec']['tmp_name'];
            $nom_sec = $_POST['nom_sec'];
            $desc_sec = $_POST['desc_sec'];

            $img_s = $_FILES['img_sec']['name'];
            $t_s = strtolower(pathinfo($img_s, PATHINFO_EXTENSION));

            $dir = "public/img/filosofia/";
            $fecha = date('Ymd_His');
            $r_v = $dir . "VIS_" . $fecha . "_" . $img_s;

            if (is_file($img_sec)) {
                if ($t_s == "jpg" or $t_s == "jpeg" or $t_s == "png") {
                    if (unlink($img_bd)) {
                        if (move_uploaded_file($img_sec, $r_v)) {
                            if ($this->model->update([
                                'id_vis' => $id_vis,
                                'nom_sec' => $nom_sec,
                                'img_sec' => $r_v,
                                'desc_sec' => $desc_sec,
                                'id_usu' => $id_usu
                            ])) {
                                $tabla = new Visiones();
                                $tabla->id_vis = $id_vis;
                                $tabla->nom_sec = $nom_sec;
                                $tabla->img_sec = $img_bd;
                                $tabla->desc_sec = $desc_sec;
                                $tabla->id_usu = $id_usu;
                                $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => 'http://localhost/proyectos/ceunem/admin/vision');
                                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                            } else {
                                $arrResponse = array('status' => false, 'msg' => 'Error al guardar la información');
                                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                            }
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'Error al cargar la imagen');
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la imagen anterior');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Formato no aceptado');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }

                /* $arrResponse = array('status' => true, 'msg' => 'ok');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE); */
            } else {
                if ($this->model->update([
                    'id_vis' => $id_vis,
                    'nom_sec' => $nom_sec,
                    'img_sec' => $img_bd,
                    'desc_sec' => $desc_sec,
                    'id_usu' => $id_usu
                ])) {
                    $tabla = new Visiones();
                    $tabla->id_vis = $id_vis;
                    $tabla->nom_sec = $nom_sec;
                    $tabla->img_sec = $img_bd;
                    $tabla->desc_sec = $desc_sec;
                    $tabla->id_usu = $id_usu;
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => 'http://localhost/proyectos/ceunem/admin/vision');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al cargar los datos');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
}
