<?php
require_once 'libs/controller.php';
class Oferta extends Controller
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
        /* $id_usu = $this->id = $_SESSION['id_usu'];
        $fila = $this->model->contar($id_usu); */
        $tablas = $this->model->getOfertas();
        $this->view->tablas = $tablas;

        $this->view->render('oferta/index');
    }

    function addOferta()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_url = $_FILES['img_url']['tmp_name'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $btn_name = $_POST['btn_name'];
            $link = $_POST['link'];
            $id_usu = $_POST['id_usu'];
            $estado = 1;

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/oferta/";
            $fecha = date('Ymd_His');
            $r = $dir . $tit . $fecha . "_" . $imgName;

            $item = [
                'img_url' => $r,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'btn_name' => $btn_name,
                'link' => $link,
                'estado' => $estado,
                'id_usu' => $id_usu
            ];

            if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                if ($this->model->insert($item)) {
                    if(move_uploaded_file($img_url, $r)){
                        $arrResponse = array(
                            'status' => true, 'msg' => 'ok',
                            'url' => URL . 'oferta'
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }else{
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al guardar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al insertar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Formato no admitido',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getOferta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_ofe =  json_decode(file_get_contents('php://input'))->id_ofe;
            $tabla = $this->model->getById($id_ofe);
            echo json_encode($tabla);
        }
    }

    function upOferta()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_url = $_FILES['img_url']['tmp_name'];
            $tit = $_POST['tit'];
            $descripcion = $_POST['descripcion'];
            $btn_name = $_POST['btn_name'];
            $link = $_POST['link'];
            $id_usu = $_POST['id_usu'];
            $estado = $_POST['estado'];
            $id_ofe = $_POST['id_ofe'];
            $imgBd = $_POST['imgBd'];

            $imgName = $_FILES['img_url']['name'];
            $timg = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $dir = "public/img/oferta/";
            $fecha = date('Ymd_His');
            $r = $dir . $tit . $fecha . "_" . $imgName;

            $imagenRuta = is_file($img_url) ? $imagenRuta = $r : $imagenRuta = $imgBd;
            $item = [
                'id_ofe' => $id_ofe,
                'img_url' => $imagenRuta,
                'tit' => $tit,
                'descripcion' => $descripcion,
                'btn_name' => $btn_name,
                'link' => $link,
                'estado' => $estado,
                'id_usu' => $id_usu
            ];

            if(is_file($img_url)){
                if ($timg == "jpg" or $timg == "jpeg" or $timg == "png" or $timg == "mp4") {
                    if ($this->model->update($item)) {
                        if(move_uploaded_file($img_url, $r)){
                            unlink($imgBd);
                            $arrResponse = array(
                                'status' => true, 'msg' => 'ok',
                                'url' => URL . 'oferta'
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }else{
                            $arrResponse = array(
                                'status' => false, 'msg' => 'Error al guardar datos',
                            );
                            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $arrResponse = array(
                            'status' => false, 'msg' => 'Error al insertar datos',
                        );
                        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Formato no admitido',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if ($this->model->update($item)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'oferta'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al insertar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }

    function delOferta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_ofe = $_POST['id_ofe'];
            $id_usu = $_POST['id_usu'];
            $img_url = $_POST['img_delete'];
            
            if ($this->model->delete([
                'id_ofe' => $id_ofe,
                'id_usu' => $id_usu
            ])) {
                unlink($img_url);
                $arrResponse = array(
                    'status' => true, 'msg' => 'ok', 
                    'url' => URL.'oferta');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar los datos');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function statusOferta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_ofe = $_POST['id_ofe'];
            $id_usu = $_POST['id_usu'];
            $estado = $_POST['estado'];
            
            $estado2 = $estado == 1 ? $estado2=0 : $estado2=1;

            if ($this->model->estado([
                'id_ofe' => $id_ofe,
                'id_usu' => $id_usu,
                'estado' => $estado2
            ])) {
                $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'oferta');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al cambiar el status');
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
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
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'oferta');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->updateEncabezado($editar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'oferta');
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
