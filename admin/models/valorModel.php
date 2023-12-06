<?php
include_once 'models/clases/valores.php';

class ValorModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getVal($id)
    {
        $item = new Valores();

        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM valores WHERE id_usu = :id_usu"
            );

            $query->execute(['id_usu' => $id]);

            while ($row = $query->fetch()) {
                $item->id_val = $row['id_val'];
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

    public function countRow($id){
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM valores WHERE id_usu = :id_usu");
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
                'INSERT INTO valores (nom_sec, img_sec, desc_sec, estado, id_usu)
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

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE valores
        SET nom_sec = :nom_sec, img_sec = :img_sec, desc_sec = :desc_sec
        WHERE id_val = :id_val AND id_usu = :id_usu");

        try {
            $query->execute([
                'id_val' => $item['id_val'],
                'nom_sec' => $item['nom_sec'],
                'img_sec' => $item['img_sec'],
                'desc_sec' => $item['desc_sec'],
                'id_usu' => $item['id_usu']
            ]);
            return true;
        } catch (PDOException $th) {
            echo $th;
        }
    }

}