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
                'INSERT INTO sliders (img1, tit1, desc1, link1, img2, tit2, desc2, link2, id_usu, tUrl1, tUrl2)
                VALUES (:img1, :tit1, :desc1, :link1, :img2, :tit2, :desc2, :link2, :id_usu, :tUrl1, :tUrl2)'
            );
            $query->execute([
                'img1' => $datos['img1'],
                'tit1' => $datos['tit1'],
                'desc1' => $datos['desc1'],
                'link1' => $datos['link1'],
                'img2' => $datos['img2'],
                'tit2' => $datos['tit2'],
                'desc2' => $datos['desc2'],
                'link2' => $datos['link2'],
                'id_usu' => $datos['id_usu'],
                'tUrl1' => $datos['tUrl1'],
                'tUrl2' => $datos['tUrl2'],
            ]);
            return true;
        } catch (PDOException $th) {
            return false;
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
        $item = new Imagen();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM sliders WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);
            while ($row = $query->fetch()) {
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
                
            }

            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'UPDATE sliders
                SET img1 = :img1, tit1 = :tit1, desc1 = :desc1, link1 = :link1, img2 = :img2, tit2 = :tit2, desc2 = :desc2, link2 = :link2, tUrl1 = :tUrl1, tUrl2 = :tUrl2
                WHERE id_slider = :id_slider AND id_usu = :id_usu'
            );
            
            $query->execute([
                'id_slider' => $datos['id_slider'],
                'img1' => $datos['img1'],
                'tit1' => $datos['tit1'],
                'desc1' => $datos['desc1'],
                'link1' => $datos['link1'],
                'img2' => $datos['img2'],
                'tit2' => $datos['tit2'],
                'desc2' => $datos['desc2'],
                'link2' => $datos['link2'],
                'id_usu' => $datos['id_usu'],
                'tUrl1' => $datos['tUrl1'],
                'tUrl2' => $datos['tUrl2'],
            ]);
            return true;
        } catch (PDOException $e) {
           echo $e;
        }
    }
}
