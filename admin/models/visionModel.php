<?php
include_once 'models/clases/visiones.php';
include_once 'models/clases/encabezados.php';

class VisionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO vision (nom_sec, img_sec, desc_sec, estado, id_usu)
                VALUES (:nom_sec, :img_sec, :desc_sec, :estado, :id_usu)'
            );
            $query->execute([
                'nom_sec' => $datos['nom_sec'],
                'img_sec' => $datos['img_sec'],
                'desc_sec' => $datos['desc_sec'],
                'estado' => $datos['estado'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getV($id)
    {
        $item = new Visiones();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM vision WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);

            while ($row = $query->fetch()) {
                $item->id_vis = $row['id_vis'];
                $item->nom_sec = $row['nom_sec'];
                $item->img_sec = $row['img_sec'];
                $item->desc_sec = $row['desc_sec'];
                $item->estado = $row['estado'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function countRow($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM vision WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE vision
        SET nom_sec = :nom_sec, img_sec = :img_sec, desc_sec = :desc_sec
        WHERE id_vis = :id_vis AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_vis' => $item['id_vis'],
                'nom_sec' => $item['nom_sec'],
                'img_sec' => $item['img_sec'],
                'desc_sec' => $item['desc_sec'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function insertEncabezado($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO encabezado (encabezado, descripcion, id_usu)
                VALUES (:encabezado, :descripcion, :id_usu)'
            );
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function getByEncabezado($encabezado)
    {
        $item = new Encabezados();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM encabezado WHERE encabezado = :encabezado"
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

    public function updateEncabezado($datos)
    {
        $query = $this->db->connect()->prepare("UPDATE encabezado
            SET descripcion = :descripcion
            WHERE id_en= :id_en AND id_usu = :id_usu AND encabezado = :encabezado");

        try {
            $query->execute([
                'encabezado' => $datos['encabezado'],
                'descripcion' => $datos['descripcion'],
                'id_usu' => $datos['id_usu'],
                'id_en' => $datos['id_en']
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
