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
                'INSERT INTO sliders (img, tit, descripcion, btn_name, link, tUrl, posicion, id_usu, seccion)
                VALUES (:img, :tit, :descripcion, :btn_name, :link, :tUrl, :posicion, :id_usu, :seccion)'
            );
            $query->execute([
                'img' => $datos['img'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'btn_name' => $datos['btn_name'],
                'link' => $datos['link'],
                'tUrl' => $datos['tUrl'],
                'posicion' => $datos['posicion'],
                'id_usu' => $datos['id_usu'],
                'seccion'=> $datos['seccion']
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function contarFilas($id, $posicion, $seccion)
    {
        
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM sliders WHERE id_usu = :id_usu AND posicion = :posicion AND seccion = :seccion");
            
            $query->execute([
                'id_usu' => $id,
                'posicion' => $posicion,
                'seccion' => $seccion
            ]);

            $filas = $query->rowCount();
            
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function getImg($id, $posicion,$seccion)
    {
        $item = new Imagen();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM sliders WHERE id_usu = :id_usu AND posicion = :posicion AND seccion = :seccion"
            );

            $query->execute([
                'id_usu' => $id,
                'posicion' => $posicion,
                'seccion' => $seccion
            ]);

            while ($row = $query->fetch()) {
                $item->id_slider = $row['id_slider'];
                $item->img = $row['img'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->posicion = $row['posicion'];
                $item->id_usu = $row['id_usu'];
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
                SET img = :img, tit = :tit, descripcion = :descripcion, btn_name = :btn_name, link = :link, tUrl = :tUrl
                WHERE id_slider = :id_slider AND id_usu = :id_usu AND posicion = :posicion'
            );
            
            $query->execute([
                'id_slider' => $datos['id_slider'],
                'img' => $datos['img'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'btn_name' => $datos['btn_name'],
                'link' => $datos['link'],
                'tUrl' => $datos['tUrl'],
                'posicion' => $datos['posicion'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $e) {
           echo $e;
        }
    }
}
