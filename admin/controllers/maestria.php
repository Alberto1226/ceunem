<?php
require_once 'libs/controller.php';
class Maestria extends Controller
{
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
        $maestrias = $this->model->getAllMaestrias();
        $this->view->maestrias = $maestrias;
        $mas_datos = $this->model->getAllCards();
        $this->view->mas_datos = $mas_datos;
        $this->view->render('maestria/index');
    }

    function addMaestria()
    {
        $nom_mas = $_POST['nom_mas'];
        $descripcion = $_POST['descripcion'];
        $desc_detalla = $_POST['desc_detallada'];
        $revoe = $_POST['revoe'];
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
        $rPdf = $dirPdf . $fecha . "_" . $nom_pdf;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf") {
            if (move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)) {
                if ($this->model->insert([
                    'nom_mas' => $nom_mas,
                    'descripcion' => $descripcion,
                    'desc_detallada' => $desc_detalla,
                    'revoe' => $revoe,
                    'img_url' => $rImg,
                    'pdf_url' => $rPdf,
                    'estado' => $estado
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'maestria');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje = "El formato es incorrecto";
        }
    }

    function addCard()
    {
        $id_mas = $_POST['id_mas'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/maestria/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png") {
            $rImg = $dirImg . $nom_img;
            if (move_uploaded_file($img_url, $rImg)) {
                if ($this->model->insertCard([
                    'id_mas' => $id_mas,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'img_url' => $rImg
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'maestria');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje =  "El formato es incorrecto";
        }
    }

    function updateMaestria()
    {
        $id_mas = $_POST['id_mas_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_mas = $_POST['nom_mas_up'];
        $descripcion = $_POST['descripcion_up'];
        $desc_detalla = $_POST['desc_detallada_up'];
        $revoe = $_POST['revoe_up'];

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
                        'desc_detallada' => $desc_detalla,
                        'revoe' => $revoe,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $maestria = new Maestrias();
                        $maestria->id_mas = $id_mas;
                        $maestria->nom_mas = $nom_mas;
                        $maestria->descripcion = $descripcion;
                        $maestria->desc_detallada = $desc_detalla;
                        $maestria->revoe = $revoe;
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
                'desc_detallada' => $desc_detalla,
                'revoe' => $revoe,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $maestria = new Maestrias();
                $maestria->id_mas = $id_mas;
                $maestria->nom_mas = $nom_mas;
                $maestria->descripcion = $descripcion;
                $maestria->desc_detallada = $desc_detalla;
                $maestria->revoe = $revoe;
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

    function updateCardMas()
    {
        $id_mas_datos = $_POST['id_upCard'];
        $id_mas = $_POST['id_up_licCard'];
        $img_url_db = $_POST['img_url_db_card'];
        $titulo = $_POST['titulo_upCard'];
        $descripcion = $_POST['descripcion_upCard'];

        $img_url = $_FILES['img_url_upCard']['tmp_name'];
        $nom_img = $_FILES['img_url_upCard']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/maestria/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;

        if (is_file($img_url)) {
            if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png") {
                try {
                    unlink($img_url_db);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                if (move_uploaded_file($img_url, $rImg)) {
                    if ($this->model->updateCard([
                        'id_mas_datos' => $id_mas_datos,
                        'id_mas' => $id_mas,
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                    ])) {
                        $mas_datos = new mas_datos();
                        $mas_datos->id_mas_datos = $id_mas_datos;
                        $mas_datos->id_mas = $id_mas;
                        $mas_datos->titulo = $titulo;
                        $mas_datos->descripcion = $descripcion;
                        $mas_datos->img_url = $img_url;

                        $this->view->maestria = $mas_datos;
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
            if ($this->model->updateCard([
                'id_mas_datos' => $id_mas_datos,
                'id_mas' => $id_mas,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db
            ])) {
                $mas_datos = new mas_datos();
                $mas_datos->id_mas_datos = $id_mas_datos;
                $mas_datos->id_mas = $id_mas;
                $mas_datos->titulo = $titulo;
                $mas_datos->descripcion = $descripcion;
                $mas_datos->img_url = $img_url;

                $this->view->maestria = $mas_datos;
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

    function deleteCardMas()
    {
        $id_mas = $_POST['id_delete_card'];
        $img_url = $_POST['img_delete_card'];

        if (unlink($img_url)) {
            if ($this->model->deleteCard($id_mas)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'maestria');
        } else {
            if ($this->model->deleteCard($id_mas)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'maestria');
            // $this->view->mensaje = "Error al eliminar la Card";
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

    function addEncabezado()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usu = $_POST['id_usu'];
            $encabezado = $_POST['encabezado'];
            $descripcion = $_POST['descripcion'];
            $id_en = $_POST['id_en'];

            $ids = empty($id_en) ? $ids = false : $ids = true;

            $insertar = [
                'id_usu' => $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
            ];

            $editar = [
                'id_usu' => $id_usu,
                'encabezado' => $encabezado,
                'descripcion' => $descripcion,
                'id_en' => $id_en
            ];

            if ($ids == false) {
                if ($this->model->insertEncabezado($insertar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'maestria');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->updateEncabezado($editar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'maestria');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
    }

    function getEncabezado()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $encabezado =  json_decode(file_get_contents('php://input'))->encabezado;
            $tabla = $this->model->getByEncabezado($encabezado);
            echo json_encode($tabla);
        }
    }
}
