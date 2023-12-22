<?php
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
            $query = $this->db->connect()->query("SELECT * FROM equipo WHERE estado=1 AND id_usu");
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

    public function getSliders()
    {
        $items= [];

        try {
            $query = $this->db->connect()->query(
                "SELECT*FROM sliders WHERE id_usu = 1");

            while ($row = $query->fetch()) {
                $item = new Imagen();

                $item->id_slider = $row['id_slider'];
                $item->img = $row['img'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->posicion = $row['posicion'];
                $item->id_usu = $row['id_usu'];
                
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
