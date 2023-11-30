<?php
require_once 'libs/controller.php';
class Blog extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $articulos = $this->model->getAllArticulos();
        $this->view->articulos = $articulos;
        $this->view->render('blog/index');
    }

    function addArticulo()
    {
        $categoria = $_POST['categoria'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $link_url = $_POST['link_url'];
        $estado = $_POST['estado'];
        $img_url = $_FILES["img_url"]["tmp_name"];
        $nom_img = $_FILES["img_url"]["name"];
        $tipoImagen = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $directorio = "public/img/blog/";
        $fecha = date('Ymd_His');
        $ruta = $directorio . $fecha . "_" . $nom_img;

        if ($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png") {
            if (move_uploaded_file($img_url, $ruta)) {
                if ($this->model->insert([
                    'categoria' => $categoria,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'img_url' => $ruta,
                    'link_url' => $link_url,
                    'estado' => $estado,
                ])) {
                    $this->view->mensaje = "Se agrego correctamente";
                }
                header('location: ' . URL . 'blog');
            } else {
                $this->view->mensaje = "Error al guardar en el directorio";
            }
        } else {
            $this->view->mensaje = "El formato es incorrecto";
        }
    }

    function updateArticulo()
    {
        $id_blog = $_POST['id_blog_up'];
        $img_url_db = $_POST['img_url_db'];

        $categoria = $_POST['categoria_up'];
        $titulo = $_POST['titulo_up'];
        $descripcion = $_POST['descripcion_up'];
        $link_url = $_POST['link_url_up'];
        $img_url = $_FILES["img_url_up"]["tmp_name"];
        $nom_img = $_FILES["img_url_up"]["name"];
        $tipoImagen = strtolower(pathinfo($nom_img, PATHINFO_EXTENSION));
        $directorio = "public/img/blog/";
        $fecha = date('Ymd_His');
        $ruta = $directorio . $fecha . "_" . $nom_img;

        if (is_file($img_url)) {
            if ($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png") {
                try {
                    unlink($img_url_db);
                } catch (\Throwable $th) {
                }
                if (move_uploaded_file($img_url, $ruta)) {
                    if ($this->model->update([
                        'id_blog' => $id_blog,
                        'categoria' => $categoria,
                        'titulo' => $titulo,
                        'descripcion' => $descripcion,
                        'img_url' => $ruta,
                        'link_url' => $link_url,
                    ])) {
                        $articulo = new Articulo();
                        $articulo->id_blog = $id_blog;
                        $articulo->categoria = $categoria;
                        $articulo->titulo = $titulo;
                        $articulo->descripcion = $descripcion;
                        $articulo->img_url = $ruta;
                        $articulo->link_url = $link_url;

                        $this->view->articulo = $articulo;
                        $this->view->mensaje = "Se modificico exitosamente";
                        header('location: ' . URL . 'blog');
                    } else {
                        $this->view->mensaje = "Error al modificar los daos";
                    }
                } else {
                    $this->view->mensaje = "Error al subir la imagen";
                }
            } else {
                $this->view->mensaje = "Solo se acepta formatos: jpg/jpeg/png";
            }
        } else {
            if ($this->model->update([
                'id_blog' => $id_blog,
                'categoria' => $categoria,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img_url' => $img_url_db,
                'link_url' => $link_url,
            ])) {
                $articulo = new Articulo();
                $articulo->id_blog = $id_blog;
                $articulo->categoria = $categoria;
                $articulo->titulo = $titulo;
                $articulo->descripcion = $descripcion;
                $articulo->img_url = $img_url_db;
                $articulo->link_url = $link_url;

                $this->view->articulo = $articulo;
                $this->view->mensaje = "Se modificico exitosamente";
                header('location: ' . URL . 'blog');
            } else {
                $this->view->mensaje = "Error al modificar los datos";
            }
        }
    }

    function deleteArticulo()
    {
        $id_blog = $_POST['id_delete'];
        $img_url = $_POST['img_delete'];

        if (unlink($img_url)) {
            if ($this->model->delete($id_blog)) {
                $this->view->mensaje = "Artículo eliminado correctamente";
            }
            header('location: ' . URL . 'blog');
        } else {
            $this->view->mensaje = "Error al elimiar el artículo";
        }
    }

    function statusArticulo()
    {
        $id_blog = $_POST['id_estado'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            $new = 0;
            if ($this->model->estado([
                'id_blog' => $id_blog,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'blog');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'blog');
            }
        } else {
            $new = 1;
            if ($this->model->estado([
                'id_blog' => $id_blog,
                'estado' => $new,
            ])) {
                header('location: ' . URL . 'blog');
            } else {
                $this->view->mensaje = "Error al cambiar Status";
                header('location: ' . URL . 'blog');
            }
        }
    }
}
