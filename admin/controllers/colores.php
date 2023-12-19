<?php
require_once 'libs/controller.php';
class Colores extends Controller
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
        $this->view->render('colores/index');
    }

    function addColors()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $let_hf = $_POST['let_hf'];
            $let_hover = $_POST['let_hover'];
            $btn_font = $_POST['btn_font'];
            $font = $_POST['font'];
            $btn_hfont = $_POST['btn_hfont'];
            $fondo_hf = $_POST['fondo_hf'];
            $btn_color = $_POST['btn_color'];
            $btn_hover = $_POST['btn_hover'];
            $background = $_POST['background'];
            $id_usu = $_POST['id_usu'];

            $color = [
                'let_hf' => $let_hf,
                'let_hover' => $let_hover,
                'btn_font' => $btn_font,
                'font' => $font,
                'btn_hfont' => $btn_hfont,
                'fondo_hf' => $fondo_hf,
                'btn_color' => $btn_color,
                'btn_hover' => $btn_hover,
                'background' => $background,
                'id_usu' => $id_usu
            ];

            $isEmpty = array_filter($color, function ($value) {
                return empty($value);
            });

            if (!$isEmpty) {
                if ($this->model->insert($color)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'colores'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al guardar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Uno o más campos están vacíos!',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function getColores()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $this->id = $_SESSION['id_usu'];
            $tabla = $this->model->getColor($id_usu);
            echo json_encode($tabla);
        }
    }

    function upColors(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $let_hf = $_POST['let_hf'];
            $let_hover = $_POST['let_hover'];
            $btn_font = $_POST['btn_font'];
            $font = $_POST['font'];
            $btn_hfont = $_POST['btn_hfont'];
            $fondo_hf = $_POST['fondo_hf'];
            $btn_color = $_POST['btn_color'];
            $btn_hover = $_POST['btn_hover'];
            $background = $_POST['background'];
            $id_usu = $_POST['id_usu'];
            $id_color = $_POST['id_color'];

            $color = [
                'id_color' => $id_color,
                'let_hf' => $let_hf,
                'let_hover' => $let_hover,
                'btn_font' => $btn_font,
                'font' => $font,
                'btn_hfont' => $btn_hfont,
                'fondo_hf' => $fondo_hf,
                'btn_color' => $btn_color,
                'btn_hover' => $btn_hover,
                'background' => $background,
                'id_usu' => $id_usu
            ];

            $isEmpty = array_filter($color, function ($value) {
                return empty($value);
            });

            if (!$isEmpty) {
                if ($this->model->update($color)) {
                    $arrResponse = array(
                        'status' => true, 'msg' => 'ok',
                        'url' => URL . 'colores'
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                } else {
                    $arrResponse = array(
                        'status' => false, 'msg' => 'Error al guardar datos',
                    );
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $arrResponse = array(
                    'status' => false, 'msg' => 'Uno o más campos están vacíos!',
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
