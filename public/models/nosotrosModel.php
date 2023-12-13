<?php
include_once 'models/clases/mision.php';
include_once 'models/clases/vision.php';
include_once 'models/clases/objetivo.php';
include_once 'models/clases/profesionista.php';

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
}
