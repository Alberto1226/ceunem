<?php
include_once 'models/clases/imagen.php';
class SlidersModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO sliders (img, tit, descripcion, link, tUrl, id_usu)
                VALUES (:img, :tit, :descripcion, :link, :tUrl, :id_usu)'
            );
            $query->execute([
                'img' => $datos['img'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'link' => $datos['link'],
                'tUrl' => $datos['tUrl'],
                'id_usu' => $datos['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function countRow($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM sliders WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function getImg($id)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM sliders WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
                $item = new Imagen();
                $item->id_slider = $row['id_slider'];
                $item->img = $row['img'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->id_usu = $row['id_usu'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'UPDATE sliders
                SET img = :img, tit = :tit, descripcion = :descripcion, link = :link, tUrl = :tUrl
                WHERE id_slider = :id_slider AND id_usu = :id_usu'
            );
            
            $query->execute([
                'id_slider' => $datos['id_slider'],
                'img' => $datos['img'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'link' => $datos['link'],
                'tUrl' => $datos['tUrl'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $e) {
           echo $e;
        }
    }
}
