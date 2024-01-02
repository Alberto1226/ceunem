<?php
require_once 'libs/controller.php';
class Mapa extends Controller
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
        $this->view->render('mapa/index');
    }

    function addMapa(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $mapa = $_POST['mapa'];
            $id_mapa = $_POST['id_mapa'];
            
            $ids = empty($id_mapa) ? $ids=false : $ids=true;

            $insertar =[
                'id_usu'=> $id_usu,
                'mapa' => $mapa,
            ];

            $editar =[
                'id_usu'=> $id_usu,
                'mapa' => $mapa,
                'id_mapa' => $id_mapa
            ];

            if($ids==false){
                if($this->model->insert($insertar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'mapa');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }else{
                if($this->model->update($editar)){
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL.'mapa');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            
        }
    }

    function getMapa(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tabla = $this->model->getMapa(1);
            echo json_encode($tabla); 
        }
    }

}
