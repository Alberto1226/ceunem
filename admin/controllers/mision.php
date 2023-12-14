<?php
require_once 'libs/controller.php';
class Mision extends Controller
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
        $tabla = $this->model->getM($id_usu);
        $this->view->tabla = $tabla;
        $fila = $this->model->countIni($id_usu);
        $this->view->fila = $fila;
        $this->view->render('mision/index');
    }

    function addMision()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_body = $_FILES['img_body']['tmp_name'];
            $autor = $_POST['autor'];
            $frase = $_POST['frase'];
            $mision = $_POST['mision'];
            $id_usu = $_POST['id_usu'];

            //obtenemos los nombres
            $img_b = $_FILES['img_body']['name'];

            //recupereamos las extenciones para hacer una validacion mas
            $t_b = strtolower(pathinfo($img_b, PATHINFO_EXTENSION));

            //Preparamos la direccion donde se copiaran
            $dir = "public/img/mision/";
            $fecha = date('Ymd_His');
            $r_body = $dir . $fecha . "_" . $img_b;

            if (
                strlen($frase) != 0 and strlen($autor) != 0 and strlen($mision) != 0 and strlen($id_usu) != 0
                and strlen($img_body) != 0 and $t_b == "jpg" or $t_b == "jpeg" or $t_b == "png"
            ) {
                if (move_uploaded_file($img_body, $r_body)) {
                    if ($this->model->insert([
                        'frase' => $frase,
                        'autor' => $autor,
                        'mision' => $mision,
                        'img_body' => $r_body,
                        'estado' => 1,
                        'id_usu' => $id_usu
                    ])) {
                        $arrResponse = array('status' => true, 'msg' => 'ok');
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

    function upMision()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_bd = $_POST['img_bd'];
            $id_mis = $_POST['id_mis'];
            $id_usu = $_POST['id_usu'];

            $img_body = $_FILES['img_body']['tmp_name'];
            $autor = $_POST['autor'];
            $frase = $_POST['frase'];
            $mision = $_POST['mision'];

            //obtenemos los nombres
            $img_b = $_FILES['img_body']['name'];

            //recupereamos las extenciones para hacer una validacion mas
            $t_b = strtolower(pathinfo($img_b, PATHINFO_EXTENSION));

            //Preparamos la direccion donde se copiaran
            $dir = "public/img/mision/";
            $fecha = date('Ymd_His');
            $r_body = $dir . $fecha . "_" . $img_b;

            if (is_file($img_body)) {
                if ($t_b == "jpg" or $t_b == "jpeg" or $t_b == "png") {
                    try {
                        unlink($img_bd);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    if (move_uploaded_file($img_body, $r_body)) {
                        if ($this->model->update([
                            'id_mis' => $id_mis,
                            'frase' => $frase,
                            'autor' => $autor,
                            'mision' => $mision,
                            'img_body' => $r_body,
                            'id_usu' => $id_usu
                        ])) {
                            $tabla = new Misiones();
                            $tabla->id_mis = $id_mis;
                            $tabla->frase = $frase;
                            $tabla->mision = $mision;
                            $tabla->img_body = $img_body;
                            $tabla->id_usu = $id_usu;

                            $this->view->tabla = $tabla;
                            $arrResponse = array('status' => true, 'msg' => 'ok');
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'Error al subir los datos.');
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error al subir la nueva imagen');
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Verifique el formato de la imagen.');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->update([
                    'id_mis' => $id_mis,
                    'frase' => $frase,
                    'autor' => $autor,
                    'mision' => $mision,
                    'img_body' => $img_bd,
                    'id_usu' => $id_usu
                ])) {
                    $tabla = new Misiones();
                    $tabla->id_mis = $id_mis;
                    $tabla->frase = $frase;
                    $tabla->mision = $mision;
                    $tabla->img_body = $img_bd;
                    $tabla->id_usu = $id_usu;

                    $this->view->tabla = $tabla;
                    $arrResponse = array('status' => true, 'msg' => 'ok');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error al subir los datos.');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }
}
