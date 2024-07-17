<?php
require_once 'libs/controller.php';
class Cursos extends Controller
{
    function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        parent::__construct();

        if (empty($_SESSION['login'])) {
            header('Location: ' . URL . 'login');
            die();
        }
    }

    function render()
    {
        $cursos = $this->model->getAllCursos();
        $curso_datos = $this->model->getAllCards();
        $this->view->curso_datos = $curso_datos;
        $this->view->cursos = $cursos;
        $this->view->render('cursos/index');
    }

    /*function addCursos()
    {
        $nom_curso = $_POST['nom_curso'];
        $descripcion = $_POST['descripcion'];
        $desc_detalla = $_POST['desc_detallada'];
        $revoe = $_POST['revoe'];
        $estado = $_POST['estado'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";


        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/cursos/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;
        $rPdf = $dirPdf . $fecha . "_" . $nom_img;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png" and $tPdf == "pdf") {
            $rImg = $dirImg . $nom_img;
            $rPdf = $dirPdf . $nom_pdf;
            if (move_uploaded_file($img_url, $rImg) and move_uploaded_file($pdf_url, $rPdf)) {
                if ($this->model->insert([
                    'nom_curso' => $nom_curso,
                    'descripcion' => $descripcion,
                    'desc_detallada' => $desc_detalla,
                    'revoe' => $revoe,
                    'img_url' => $rImg,
                    'pdf_url' => $rPdf,
                    'estado' => $estado
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje =  "El formato es incorrecto";
        }
    }*/
    function addCursos()
{
    $nom_curso = isset($_POST['nom_curso']) ? $_POST['nom_curso'] : '';
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
        $dirImg = "public/img/cursos/";

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
        header('location: ' . URL . 'cursos');
    }

    if (!empty($_FILES['pdf_url']['tmp_name'])) {
        $pdf_url = $_FILES['pdf_url']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/cursos/";

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
        'nom_curso' => $nom_curso,
        'descripcion' => $descripcion,
        'desc_detallada' => $desc_detallada,
        'revoe' => $revoe,
        'img_url' => $img_url,
        'pdf_url' => $pdf_url,
        'estado' => $estado
    ])) {
        $this->view->mensaje = "Se agregó correctamente";
    } else {
        $this->view->mensaje = "Error al agregar la cursos";
    }
}


    function addCard()
    {
        $id_curso = $_POST['id_cur'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $img_url = $_FILES['img_url']['tmp_name'];
        $nom_img = $_FILES['img_url']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";

        $fecha = date('Ymd_His');
        $rImg = $dirImg . $fecha . "_" . $nom_img;

        if ($tImg == "jpg" or $tImg == "jpeg" or $tImg == "png") {
            $rImg = $dirImg . $nom_img;
            if (move_uploaded_file($img_url, $rImg)) {
                if ($this->model->insertCard([
                    'id_curso' => $id_curso,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'img_url' => $rImg
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje =  "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje =  "El formato es incorrecto";
        }
    }

    /*function updateCur()
    {
        $id_curso = $_POST['id_curso_up'];
        $img_url_db = $_POST['img_url_db'];
        $pdf_url_db = $_POST['pdf_url_db'];

        $nom_curso = $_POST['nom_curso_up'];
        $descripcion = $_POST['descripcion_up'];
        $desc_detalla = $_POST['desc_detallada_up'];
        $revoe = $_POST['revoe_up'];

        $img_url = $_FILES['img_url_up']['tmp_name'];
        $nom_img = $_FILES['img_url_up']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";


        $pdf_url = $_FILES['pdf_url_up']['tmp_name'];
        $nom_pdf = $_FILES['pdf_url_up']['name'];
        $tPdf = strtolower(pathinfo($nom_pdf, PATHINFO_EXTENSION));
        $dirPdf = "public/docs/cursos/";

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
                        'id_curso' => $id_curso,
                        'nom_curso' => $nom_curso,
                        'descripcion' => $descripcion,
                        'desc_detallada' => $desc_detalla,
                        'revoe' => $revoe,
                        'img_url' => $rImg,
                        'pdf_url' => $rPdf,
                    ])) {
                        $cursos = new CursosEC();
                        $cursos->id_curso = $id_curso;
                        $cursos->nom_curso = $nom_curso;
                        $cursos->descripcion = $descripcion;
                        $cursos->desc_detallada = $desc_detalla;
                        $cursos->revoe = $revoe;
                        $cursos->img_url = $img_url;
                        $cursos->pdf_url = $pdf_url;

                        $this->view->cursos = $cursos;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'cursos');
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
                'id_curso' => $id_curso,
                'nom_curso' => $nom_curso,
                'descripcion' => $descripcion,
                'desc_detallada' => $desc_detalla,
                'revoe' => $revoe,
                'img_url' => $img_url_db,
                'pdf_url' => $pdf_url_db,
            ])) {
                $cursos = new CursosEC();
                $cursos->id_curso = $id_curso;
                $cursos->nom_curso = $nom_curso;
                $cursos->descripcion = $descripcion;
                $cursos->desc_detallada = $desc_detalla;
                $cursos->revoe = $revoe;
                $cursos->img_url = $img_url_db;
                $cursos->pdf_url = $pdf_url_db;

                $this->view->cursos = $cursos;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }*/

    function updateCardCurso()
    {
        $id_cur_datos = $_POST['id_upCard'];
        $id_cur = $_POST['id_up_cursoCard'];
        $img_url_db = $_POST['img_url_db_card'];
        $titulo = $_POST['titulo_upCard'];
        $descripcion = $_POST['descripcion_upCard'];

        $img_url = $_FILES['img_url_upCard']['tmp_name'];
        $nom_img = $_FILES['img_url_upCard']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";

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
                        'id_cur_datos' => $id_cur_datos,
                        'id_cur' => $id_cur,
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'img_url' => $rImg,
                    ])) {
                        $cur_datos = new curso_datos();
                        $cur_datos->id_curso_datos = $id_cur_datos;
                        $cur_datos->id_curso = $id_cur;
                        $cur_datos->titulo = $titulo;
                        $cur_datos->descripcion = $descripcion;
                        $cur_datos->img_url = $img_url;

                        $this->view->curso = $cur_datos;
                        $this->view->mensaje = "Se modifico exitosamente";
                        header('location: ' . URL . 'cursos');
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
                'id_cur_datos' => $id_cur_datos,
                'id_cur' => $id_cur,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db
            ])) {
                $cur_datos = new curso_datos();
                $cur_datos->id_curso_datos = $id_cur_datos;
                $cur_datos->id_curso = $id_cur;
                $cur_datos->titulo = $titulo;
                $cur_datos->descripcion = $descripcion;
                $cur_datos->img_url = $img_url;

                $this->view->curso = $cur_datos;
                $this->view->mensaje = "Se modifico exitosamente";
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al modificar datos";
            }
        }
    }
    public function updateCur()
{
    $id_curso = $_POST['id_curso_up'];
    $img_url_db = $_POST['img_url_db'];
    $pdf_url_db = $_POST['pdf_url_db'];

    $nom_curso = $_POST['nom_curso_up'];
    $descripcion = $_POST['descripcion_up'];
    $desc_detallada = $_POST['desc_detallada_up'];
    $revoe = $_POST['revoe_up'];

    // Si se subió un archivo de imagen
    if ($_FILES['img_url_up']['size'] > 0) {
        $img_url = $_FILES['img_url_up']['tmp_name'];
        $nom_img = $_FILES['img_url_up']['name'];
        $tImg = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $dirImg = "public/img/cursos/";

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
        $dirPdf = "public/docs/cursos/";

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
        'id_curso' => $id_curso,
        'nom_curso' => $nom_curso,
        'descripcion' => $descripcion,
        'desc_detallada' => $desc_detallada,
        'revoe' => $revoe,
        'img_url' => $img_url_db,
        'pdf_url' => $pdf_url_db,
    ])) {
        // Construye un objeto cursoss con los nuevos datos
        $cursos = new Cursos();
        $cursos->id_curso = $id_curso;
        $cursos->nom_curso = $nom_curso;
        $cursos->descripcion = $descripcion;
        $cursos->desc_detallada = $desc_detallada;
        $cursos->revoe = $revoe;
        $cursos->img_url = $img_url_db;
        $cursos->pdf_url = $pdf_url_db;

        // Establece los mensajes y datos para la vista
       // $this->view->cursos = $cursos;
       // $this->view->mensaje = "Se modifico exitosamente";
        header('location: ' . URL . 'cursos');
    } else {
        $this->view->mensaje = "Error al modificar datos";
    }
}

public function deleteCur()
{
    $id_curso = $_POST['id_delete'];
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
    if ($this->model->delete($id_curso)) {
        $this->view->mensaje = "Curso eliminado correctamente";
        header('location: ' . URL . 'cursos');
    } else {
        $this->view->mensaje = "Error al eliminar el curso";
    }
}


    function deleteCardCurso()
    {
        $id_cur = $_POST['id_delete_card'];
        $img_url = $_POST['img_delete_card'];

        if (unlink($img_url)) {
            if ($this->model->deleteCard($id_cur)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'cursos');
        } else {
            if ($this->model->deleteCard($id_cur)) {
                $this->view->mensaje = "Card eliminada correctamente";
            }
            header('location: ' . URL . 'cursos');
            // $this->view->mensaje = "Error al eliminar la Card";
        }
    }

    function statusCur()
    {
        $id_curso = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_curso' => $id_curso,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'cursos');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_curso' => $id_curso,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'cursos');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'cursos');
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
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'cursos');
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            } else {
                if ($this->model->updateEncabezado($editar)) {
                    $arrResponse = array('status' => true, 'msg' => 'ok', 'url' => URL . 'cursos');
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
