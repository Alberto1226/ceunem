<?php
include_once 'models/clases/video.php';
include_once 'models/clases/whats.php';
include_once 'models/clases/articulo.php';
include_once 'models/clases/profesionista.php';
include_once 'models/clases/formulario.php';
include_once 'models/clases/imagen.php';

class HomeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVideo()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM inicio WHERE estado = 1"
            );

            while ($row = $query->fetch()) {
                $item = new Video();
                $item->id_ini = $row['id_ini'];
                $item->vid_url = $row['vid_url'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getWhats()
    {
        $item = new Whats();

        try {
            $query = $this->db->connect()->query("SELECT * FROM telefono WHERE id_usu = 1");

            while ($row = $query->fetch()) {
                $item->id_tel = $row['id_tel'];
                $item->numero = $row['numero'];
                $item->mensaje = $row['mensaje'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getAllArticulos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM blog WHERE estado=1");

            while ($row = $query->fetch()) {
                $item = new Articulo();

                $item->id_blog = $row['id_blog'];
                $item->categoria = $row['categoria'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->link_url = $row['link_url'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getProfesionisitas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM equipo WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Profesionista();

                $item->nombre = $row['nombre'];
                $item->puesto = $row['puesto'];
                $item->img_url = $row['img_url'];
                $item->rFace = $row['rFace'];
                $item->rTw = $row['rTw'];
                $item->rIns = $row['rIns'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getInputs()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM formulario");

            while ($row = $query->fetch()) {
                $item = new Formulario();

                $item->nCompleto = $row['nCompleto'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
                $item->email = $row['email'];
                $item->tel = $row['tel'];
                $item->face = $row['face'];
                $item->mensaje = $row['mensaje'];
                $item->asunto = $row['asunto'];
                $item->live = $row['live'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getImgs()
    {
        $items= [];

        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM sliders");

            while ($row = $query->fetch()) {
                $item = new Imagen();

                $item->id_slider = $row['id_slider'];
                $item->img1 = $row['img1'];
                $item->tit1 = $row['tit1'];
                $item->desc1 = $row['desc1'];
                $item->link1 = $row['link1'];
                $item->img2 = $row['img2'];
                $item->tit2 = $row['tit2'];
                $item->desc2 = $row['desc2'];
                $item->link2 = $row['link2'];
                $item->id_usu = $row['id_usu'];
                $item->tUrl1 = $row['tUrl1'];
                $item->tUrl2 = $row['tUrl2'];
                
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
