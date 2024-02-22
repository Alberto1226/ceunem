<?php
require_once 'libs/controller.php';
class Licenciatura extends Controller
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
        $licenciaturas = $this->model->getAllLicenciaturas();
        $lic_datos = $this->model->getAllCards();
        $this->view->lic_datos = $lic_datos;
        $this->view->licenciaturas = $licenciaturas;
        $this->view->render('licenciatura/index');
    }

    function addLicenciatura()
    {
        $nom_lic = $_POST['nom_lic'];
        $descripcion = $_POST['descripcion'];
        $desc_detallada = $_POST['desc_detallada'];
        $revoe = $_POST['revoe'];
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

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf") {
            $rImg = $dirImg . $nom_img;
            $rPdf = $dirPdf . $nom_pdf;
            if (move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)) {
                if ($this->model->insert([
                    'nom_lic' => $nom_lic,
                    'descripcion' => $descripcion,
                    'desc_detallada' => $desc_detallada,
                    'revoe' => $revoe,
                    'img_url' => $rImg,
                    'pdf_url' => $rPdf,
                    'estado' => $estado
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'licenciatura');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje =  "El formato es incorrecto";
        }
    }

    function addCard()
    {
        $id_lic = $_POST['id_lic'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/licenciatura/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png") {
            $rImg = $dirImg . $nom_img;
            if (move_uploaded_file($img_url, $rImg)) {
                if ($this->model->insertCard([
                    'id_lic' => $id_lic,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'img_url' => $rImg
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'licenciatura');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
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
                        'id_lic' => $id_lic,
                        'nom_lic' => $nom_lic,
                        'descripcion' => $descripcion,
                        'desc_detallada' => $desc_detalla,
                        'revoe' => $revoe,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $licenciatura = new Licenciaturas();
                        $licenciatura->id_lic = $id_lic;
                        $licenciatura->nom_lic = $nom_lic;
                        $licenciatura->descripcion = $descripcion;
                        $licenciatura->desc_detallada = $desc_detalla;
                        $licenciatura->revoe = $revoe;
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
                'desc_detallada' => $desc_detalla,
                'revoe' => $revoe,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $licenciatura = new Licenciaturas();
                $licenciatura->id_lic = $id_lic;
                $licenciatura->nom_lic = $nom_lic;
                $licenciatura->descripcion = $descripcion;
                $licenciatura->desc_detallada = $desc_detalla;
                $licenciatura->revoe = $revoe;
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

    function updateCardLic()
    {
        $id_lic_datos = $_POST['id_upCard'];
        $id_lic = $_POST['id_up_licCard'];
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
                        'id_lic_datos' => $id_lic_datos,
                        'id_lic' => $id_lic,
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                    ])) {
                        $lic_datos = new lic_datos();
                        $lic_datos->id_lic_datos = $id_lic_datos;
                        $lic_datos->id_lic = $id_lic;
                        $lic_datos->titulo = $titulo;
                        $lic_datos->descripcion = $descripcion;
                        $lic_datos->img_url = $img_url;

                        $this->view->maestria = $lic_datos;
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
            if ($this->model->updateCard([
                'id_lic_datos' => $id_lic_datos,
                'id_lic' => $id_lic,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db
            ])) {
                $lic_datos = new lic_datos();
                $lic_datos->id_lic_datos = $id_lic_datos;
                $lic_datos->id_lic = $id_lic;
                $lic_datos->titulo = $titulo;
                $lic_datos->descripcion = $descripcion;
                $lic_datos->img_url = $img_url;

                $this->view->maestria = $lic_datos;
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
            if ($this->model->delete($id_lic)) {
                $this->view->mensaje = "Maestría eliminada correctamente";
            }
            header('location: ' . URL . 'licenciatura');
            // $this->view->mensaje = "Error al eliminar la Maestría";
        }
    }

    function deleteCardLic()
    {
        $id_lic = $_POST['id_delete_card'];
        $img_url = $_POST['img_delete_card'];

        if (unlink($img_url)) {
            if ($this->model->deleteCard($id_lic)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'licenciatura');
        } else {
            if ($this->model->deleteCard($id_lic)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'licenciatura');
            // $this->view->mensaje = "Error al eliminar la Card";
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
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'licenciatura');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->updateEncabezado($editar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'licenciatura');
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
