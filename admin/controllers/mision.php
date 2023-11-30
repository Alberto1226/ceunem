<?php
require_once 'libs/controller.php';
class Mision extends Controller
{
    function __construct()
    {
        parent::__construct();
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render()
    {
        $this->view->render('mision/index');
    }

    function addMision()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img_header = $_FILES['img_header']['tmp_name'];
            $img_body = $_FILES['img_body']['tmp_name'];
            $autor = $_POST['autor'];
            $frase = $_POST['frase'];
            $mision = $_POST['mision'];

            //obtenemos los nombres
            $img_h = $_FILES['img_header']['name'];
            $img_b = $_FILES['img_body']['name'];

            //recupereamos las extenciones para hacer una validacion mas
            $t_h = strtolower(pathinfo($img_h, PATHINFO_EXTENSION));
            $t_b = strtolower(pathinfo($img_b, PATHINFO_EXTENSION));

            //Preparamos la direccion donde se copiaran
            $dir = "public/img/mision/";
            $fecha = date('Ymd_His');
            $r_header = $dir . "H_" . $fecha . "_" . $img_h;
            $r_body = $dir . "B_" . $fecha . "_" . $img_b;

            if (strlen($frase) != 0 and strlen($autor) != 0 and strlen($mision) != 0
            and strlen($img_h) != 0 and strlen($img_b) != 0 and
            $t_h == "jpg" or $t_h == "jpeg" or $t_h == "png" and
            $t_b == "jpg" or $t_b == "jpeg" or $t_b == "png") {
                if (
                    move_uploaded_file($img_header, $r_header) and
                    move_uploaded_file($img_body, $r_body)
                ) {
                if ($this->model->insert([
                        'frase' => $frase,
                        'autor' => $autor,
                        'mision' => $mision,
                        'img_header' => $r_header,
                        'img_body' => $r_body
                    ])) {
                        echo "envio exitoso";
                        //header('location: ' . URL . 'mision');
                    } else {
                        echo "Error al subir los datos";
                    }
                } else {
                    echo "Error al subir imagen";
                }
            } else {
                echo "Verifique los campos";
            }
        }
    }
}
