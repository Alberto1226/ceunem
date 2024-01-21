<?php
include_once 'models/clases/mision.php';
include_once 'models/clases/vision.php';
include_once 'models/clases/objetivo.php';
include_once 'models/clases/profesionista.php';
include_once 'models/clases/encabezados.php';
include_once 'models/clases/imagen.php';

class NosotrosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMision()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM mision WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Mision();

                $item->id_mis = $row['id_mis'];
                $item->frase = $row['frase'];
                $item->autor = $row['autor'];
                $item->mision = $row['mision'];
                $item->img_body = $row['img_body'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getVision()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM vision WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Vision();

                $item->id_vis = $row['id_vis'];
                $item->nom_sec = $row['nom_sec'];
                $item->img_sec = $row['img_sec'];
                $item->desc_sec = $row['desc_sec'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getObjetivos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM objetivos WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Objetivo();

                $item->id_obj = $row['id_obj'];
                $item->nom_sec = $row['nom_sec'];
                $item->img_sec = $row['img_sec'];
                $item->desc_sec = $row['desc_sec'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getValores()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM valores WHERE estado=1");
            while ($row = $query->fetch()) {
                $item = new Objetivo();

                $item->id_obj = $row['id_val'];
                $item->nom_sec = $row['nom_sec'];
                $item->img_sec = $row['img_sec'];
                $item->desc_sec = $row['desc_sec'];

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

    public function getByEncabezado($encabezado){
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado AND id_usu = 1"
            );
            $query->execute(['encabezado' => $encabezado]);

            $row = $query->fetch();
            if ($row) {
                $item->id_en = $row['id_en'];
                $item->encabezado = $row['encabezado'];
                $item->descripcion = $row['descripcion'];
                $item->id_usu = $row['id_usu'];
                return $item;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            return [];
        }
    }

    public function getBanner()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM sliders WHERE id_usu=1 AND seccion='nosotros' ORDER BY posicion ASC"
            );
            
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
