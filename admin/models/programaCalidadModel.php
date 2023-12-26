<?php
include_once 'models/clases/programa.php';
class ProgramaCalidadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function countRow($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM calidad WHERE id_usu = :id_usu");
            $query->execute(['id_usu' => $id]);
            $filas = $query->rowCount();
            return $filas;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare(
                'INSERT INTO calidad (nom_menu, tit, descripcion, img_url, btn_name, link, tUrl, id_usu)
                VALUES (:nom_menu, :tit, :descripcion, :img_url, :btn_name, :link, :tUrl, :id_usu)'
            );

            $query->execute([
                'nom_menu' => $datos['nom_menu'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url'],
                'btn_name' => $datos['btn_name'],
                'link' => $datos['link'],
                'tUrl' => $datos['tUrl'],
                'id_usu' => $datos['id_usu'],
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function getPrograma($id)
    {
        $item = new Programa();
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM calidad WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);

            while ($row = $query->fetch()) {
                $item->id_prog = $row['id_prog'];
                $item->nom_menu = $row['nom_menu'];
                $item->tit = $row['tit'];
                $item->descripcion = $row['descripcion'];
                $item->img_url = $row['img_url'];
                $item->btn_name = $row['btn_name'];
                $item->link = $row['link'];
                $item->tUrl = $row['tUrl'];
                $item->id_usu = $row['id_usu'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($datos){
        try {
            $query = $this->db->connect()->prepare(
                'UPDATE calidad 
                SET nom_menu = :nom_menu, tit = :tit, 
                descripcion = :descripcion, img_url = :img_url, 
                btn_name = :btn_name, link = :link, tUrl = :tUrl
                WHERE id_prog = :id_prog AND id_usu = :id_usu'
            );

            $query->execute([
                'id_prog' => $datos['id_prog'],
                'nom_menu' => $datos['nom_menu'],
                'tit' => $datos['tit'],
                'descripcion' => $datos['descripcion'],
                'img_url' => $datos['img_url'],
                'btn_name' => $datos['btn_name'],
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