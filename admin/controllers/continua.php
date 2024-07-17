<?php
require_once 'libs/controller.php';
class Continua extends Controller
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
        $continuas = $this->model->getAllContinuas();
        $this->view->continuas = $continuas;
        $ec_datos = $this->model->getAllCards();
        $this->view->ec_datos = $ec_datos;
        $this->view->render('continua/index');
    }

    /*function addPrograma()
    {
        $nom_ec = $_POST['nom_ec'];
        $descripcion = $_POST['descripcion'];
        $desc_detalla = $_POST['desc_detallada'];
        $revoe = $_POST['revoe'];
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
                    'desc_detallada' => $desc_detalla,
                    'revoe' => $revoe,
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
    }*/
    function addPrograma()
{
    $nom_ec = isset($_POST['nom_ec']) ? $_POST['nom_ec'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $desc_detallada = isset($_POST['desc_detallada']) ? $_POST['desc_detallada'] : '';
    $revoe = isset($_POST['revoe']) ? $_POST['revoe'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

    $img_url = '';
    $pdf_url = '';

    if (!empty($_FILES['img_url']['tmp_name'])) {
        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";

        if (in_array($tImg, ["jpg", "jpeg", "png"])) {
            $fecha = date('Ymd_His');
            $rImg = $dirImg . $fecha . "_" . $nom_img;

            if (move_uploaded_file($img_url, $rImg)) {
                $img_url = $rImg;
            } else {
                $this->view->mensaje = "Error al guardar la imagen en el directorio";
                return;
            }
        } else {
            $this->view->mensaje = "El formato de la imagen es incorrecto";
            return;
        }
        header('location: ' . URL . 'continua');
    }

    if (!empty($_FILES['pdf_url']['tmp_name'])) {
        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/continua/";

        if ($tPdf == "pdf") {
            $fecha = date('Ymd_His');
            $rPdf = $dirPdf . $fecha . "_" . $nom_pdf;

            if (move_uploaded_file($pdf_url, $rPdf)) {
                $pdf_url = $rPdf;
            } else {
                $this->view->mensaje = "Error al guardar el PDF en el directorio";
                return;
            }
        } else {
            $this->view->mensaje = "El formato del PDF es incorrecto";
            return;
        }
    }

    if ($this->model->insert([
        'nom_ec' => $nom_ec,
        'descripcion' => $descripcion,
        'desc_detallada' => $desc_detallada,
        'revoe' => $revoe,
        'img_url' => $img_url,
        'pdf_url' => $pdf_url,
        'estado' => $estado
    ])) {
        $this->view->mensaje = "Se agregó correctamente";
    } else {
        $this->view->mensaje = "Error al agregar la continua";
    }
}
    function addCard()
    {
        $id_ec = $_POST['id_ec'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png") {
            $rImg = $dirImg . $nom_img;
            if (move_uploaded_file($img_url, $rImg)) {
                if ($this->model->insertCard([
                    'id_ec' => $id_ec,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'img_url' => $rImg
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje =  "El formato es incorrecto";
        }
    }

    /*function updatePrograma()
    {
        $id_ec = $_POST['id_ec_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_ec = $_POST['nom_ec_up'];
        $descripcion = $_POST['descripcion_up'];
        $desc_detallada = $_POST['desc_detallada_up'];
        $revoe = $_POST['revoe_up'];

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
                        'desc_detallada' => $desc_detallada,
                        'revoe' => $revoe,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $continua = new Continuas();
                        $continua->id_ec = $id_ec;
                        $continua->nom_ec = $nom_ec;
                        $continua->descripcion = $descripcion;
                        $continua->desc_detallada = $desc_detallada;
                        $continua->revoe = $revoe;
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
                'desc_detallada' => $desc_detallada,
                'revoe' => $revoe,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $continua = new Continuas();
                $continua->id_ec = $id_ec;
                $continua->nom_ec = $nom_ec;
                $continua->descripcion = $descripcion;
                $continua->descripcion = $descripcion;
                $continua->desc_detallada = $desc_detallada;
                $continua->img_url = $img_url_db;
                $continua->pdf_url = $pdf_url_db;

                $this->view->continua = $continua;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'continua');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }*/
    public function updatePrograma()
{
    $id_ec = $_POST['id_ec_up'];
    $img_url_db = $_POST['img_url_db'];
    $pdf_url_db = $_POST['pdf_url_db'];

    $nom_ec = $_POST['nom_ec_up'];
    $descripcion = $_POST['descripcion_up'];
    $desc_detallada = $_POST['desc_detallada_up'];
    $revoe = $_POST['revoe_up'];

    // Si se subió un archivo de imagen
    if ($_FILES['img_url_up']['size'] > 0) {
        $img_url = $_FILES['img_url_up']['tmp_name'];
        $nom_img = $_FILES['img_url_up']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";

        if (in_array($tImg, ["jpg", "jpeg", "png"])) {
            $rImg = $dirImg . date('Ymd_His') . "_" . $nom_img;

            // Mover la imagen y actualizar la URL si se sube correctamente
            if (move_uploaded_file($img_url, $rImg)) {
                $img_url_db = $rImg;
            } else {
                $this->view->mensaje = "Error al subir imagen";
                return;
            }
        } else {
            $this->view->mensaje = "Error al actualizar: formato de imagen incorrecto";
            return;
        }
    }

    // Si se subió un archivo PDF
    if ($_FILES['pdf_url_up']['size'] > 0) {
        $pdf_url = $_FILES['pdf_url_up']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url_up']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/continua/";

        if ($tPdf == "pdf") {
            $rPdf = $dirPdf . date('Ymd_His') . "_" . $nom_pdf;

            // Mover el PDF y actualizar la URL si se sube correctamente
            if (move_uploaded_file($pdf_url, $rPdf)) {
                $pdf_url_db = $rPdf;
            } else {
                $this->view->mensaje = "Error al subir PDF";
                return;
            }
        } else {
            $this->view->mensaje = "Error al actualizar: formato de PDF incorrecto";
            return;
        }
    }

    // Intenta actualizar los datos en la base de datos
    if ($this->model->update([
        'id_ec' => $id_ec,
        'nom_ec' => $nom_ec,
        'descripcion' => $descripcion,
        'desc_detallada' => $desc_detallada,
        'revoe' => $revoe,
        'img_url' => $img_url_db,
        'pdf_url' => $pdf_url_db,
    ])) {
        // Construye un objeto continuas con los nuevos datos
        $continua = new Continuas();
        $continua->id_ec = $id_ec;
        $continua->nom_ec = $nom_ec;
        $continua->descripcion = $descripcion;
        $continua->desc_detallada = $desc_detallada;
        $continua->revoe = $revoe;
        $continua->img_url = $img_url_db;
        $continua->pdf_url = $pdf_url_db;

        // Establece los mensajes y datos para la vista
        $this->view->continua = $continua;
        $this->view->mensaje = "Se modificó exitosamente";
        header('location: ' . URL . 'continua');
    } else {
        $this->view->mensaje = "Error al modificar datos";
    }
}
    function updateCardEc()
    {
        $id_ec_datos = $_POST['id_upCard'];
        $id_ec = $_POST['id_up_ecCard'];
        $img_url_db = $_POST['img_url_db_card'];
        $titulo = $_POST['titulo_upCard'];
        $descripcion = $_POST['descripcion_upCard'];

        $img_url = $_FILES['img_url_upCard']['tmp_name'];
        $nom_img = $_FILES['img_url_upCard']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/continua/";

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
                        'id_ec_datos' => $id_ec_datos,
                        'id_ec' => $id_ec,
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                    ])) {
                        $ec_datos = new ec_datos();
                        $ec_datos->id_ec_datos = $id_ec_datos;
                        $ec_datos->id_ec = $id_ec;
                        $ec_datos->titulo = $titulo;
                        $ec_datos->descripcion = $descripcion;
                        $ec_datos->img_url = $img_url;

                        $this->view->continua = $ec_datos;
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
            if ($this->model->updateCard([
                'id_ec_datos' => $id_ec_datos,
                'id_ec' => $id_ec,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db
            ])) {
                $ec_datos = new ec_datos();
                $ec_datos->id_ec_datos = $id_ec_datos;
                $ec_datos->id_ec = $id_ec;
                $ec_datos->titulo = $titulo;
                $ec_datos->descripcion = $descripcion;
                $ec_datos->img_url = $img_url;

                $this->view->continua = $ec_datos;
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

        // Verifica si la imagen está cargada y si existe antes de intentar eliminarla
    if (!empty($img_url) && file_exists($img_url)) {
        unlink($img_url);
    }

    // Verifica si el PDF está cargado y si existe antes de intentar eliminarlo
    if (!empty($pdf_url) && file_exists($pdf_url)) {
        unlink($pdf_url);
    }

    // Elimina el curso de la base de datos
    if ($this->model->delete($id_ec)) {
        $this->view->mensaje = "Eliminado correctamente";
        header('location: ' . URL . 'continua');
    } else {
        $this->view->mensaje = "Error al eliminar";
    }
    }

    function deleteCardEc()
    {
        $id_ec = $_POST['id_delete_card'];
        $img_url = $_POST['img_delete_card'];

        if (unlink($img_url)) {
            if ($this->model->deleteCard($id_ec)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'continua');
        } else {
            if ($this->model->deleteCard($id_ec)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'continua');
            // $this->view->mensaje = "Error al eliminar la Card";
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
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'continua');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->updateEncabezado($editar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'continua');
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
